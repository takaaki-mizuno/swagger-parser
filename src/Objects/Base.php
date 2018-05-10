<?php
namespace TakaakiMizuno\SwaggerParser\Objects;

use TakaakiMizuno\SwaggerParser\Exceptions\InvalidFormatException;

class Base implements \Iterator
{
    const KEY_TYPE      = 'type';
    const KEY_IS_OBJECT = 'isObject';
    const KEY_REQUIRED  = 'required';
    const KEY_DEFAULT   = 'default';
    const KEY_ITEM_TYPE = 'itemType';

    const TYPE_STRING  = 'string';
    const TYPE_INTEGER = 'integer';
    const TYPE_ARRAY   = 'array';
    const TYPE_HASH    = 'hash';
    const TYPE_BOOLEAN = 'boolean';

    protected static $name = '';

    protected $fields = [];

    protected $data = [];

    protected $path = '';

    private $enforceRequired = true;

    /**
     * Base constructor.
     *
     * @param array  $data
     * @param string $path
     * @param bool   $enforceRequired
     *
     * @throws \TakaakiMizuno\SwaggerParser\Exceptions\InvalidFormatException
     */
    public function __construct(array $data, string $path, bool $enforceRequired = true)
    {
        $this->path = $path;
        $this->enforceRequired = $enforceRequired;
        foreach ($this->fields as $key => $info) {
            if (!array_key_exists($key, $data)) {
                if ($this->enforceRequired && $info[self::KEY_REQUIRED]) {
                    throw new InvalidFormatException($key.' is required ( '.$path.' )');
                }
                if (array_key_exists(self::KEY_DEFAULT, $info)) {
                    $data[$key] = $info[self::KEY_DEFAULT];
                } else {
                    continue;
                }
            }
            if (class_exists($info[self::KEY_TYPE])) {
                $class            = $info[self::KEY_TYPE];
                $this->data[$key] = new $class($data[$key], $path.'/'.$class::getName(), $this->enforceRequired);
            } else {
                switch ($info[self::KEY_TYPE]) {
                    case self::TYPE_ARRAY:
                        $itemClass        = array_key_exists(self::KEY_ITEM_TYPE, $info) ? $info[self::KEY_ITEM_TYPE] : self::TYPE_STRING;
                        $this->data[$key] = $this->parseHashAndArray($data[$key], false, $this->path.'/'.$key, $itemClass);
                        break;
                    case self::TYPE_HASH:
                        $itemClass        = array_key_exists(self::KEY_ITEM_TYPE, $info) ? $info[self::KEY_ITEM_TYPE] : self::TYPE_STRING;
                        $this->data[$key] = $this->parseHashAndArray($data[$key], true, $this->path.'/'.$key, $itemClass);
                        break;
                    default:
                        $this->data[$key] = $data[$key];
                        break;
                }
            }
        }
    }

    /**
     * @param array  $data
     * @param bool   $isHash
     * @param string $path
     * @param string $itemClass
     *
     * @return array
     */
    protected function parseHashAndArray($data, $isHash, $path, $itemClass)
    {
        $ret = [];
        foreach ($data as $key => $value) {
            $item = class_exists($itemClass) ? new $itemClass($value, $path.'/'.$key, $this->enforceRequired) : $value;
            if ($isHash) {
                $ret[$key] = $item;
            } else {
                $ret[] = $item;
            }
        }

        return $ret;
    }

    public static function getName(): string
    {
        $name      = static::class;
        $fragments = explode('\\', $name);

        return $fragments[count($fragments) - 1];
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }

    public function get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }

    protected function validate($key, $value)
    {
        return true;
    }

    public function current()
    {
        return current($this->data);
    }

    public function next()
    {
        next($this->data);
    }

    public function key()
    {
        return key($this->data);
    }

    public function valid()
    {
        return null !== key($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }
}
