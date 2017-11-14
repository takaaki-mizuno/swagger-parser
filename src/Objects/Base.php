<?php
namespace TakaakiMizuno\SwaggerParser\Objects;

use TakaakiMizuno\SwaggerParser\Exceptions\InvalidFormatException;

class Base
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

    protected $fields = [];

    protected $data   = [];

    protected $path   = '';

    protected static $name   = '';

    public function __construct(array $data, string $path)
    {
        $this->path = $path;
        foreach ($this->fields as $key => $info) {
            if (array_key_exists($key, $data)) {
                if ($info[self::KEY_IS_OBJECT]) {
                    $class            = $info[self::KEY_TYPE];
                    $this->data[$key] = new $class($data[$key], $path.'/'.$class::getName());
                } else {
                    $this->data[$key] = $data[$key];
                }
            } else {
                if ($info[self::KEY_REQUIRED]) {
                    throw new InvalidFormatException($key.' is required');
                }
                if (array_key_exists(self::KEY_DEFAULT, $info)) {
                    $data[$key] = $info[self::KEY_DEFAULT];
                }
            }
        }
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }

    protected function validate($key, $value)
    {
        return true;
    }

    public static function getName()
    {
        $name       = static::class;
        $fragments  = explode('\\', $name);

        return $fragments[count($fragments) - 1];
    }
}
