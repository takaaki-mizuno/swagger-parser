<?php

namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class PathItem extends Base
{
    protected static $name = 'PathItem';

    protected $fields = [
        'get' => [
            Base::KEY_TYPE      => Operation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'put' => [
            Base::KEY_TYPE      => Operation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'post' => [
            Base::KEY_TYPE      => Operation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'delete' => [
            Base::KEY_TYPE      => Operation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'options' => [
            Base::KEY_TYPE      => Operation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'head' => [
            Base::KEY_TYPE      => Operation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'patch' => [
            Base::KEY_TYPE      => Operation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'parameters' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Parameter::class,
        ],
    ];

    public function getMethods()
    {
        $ret     = [];
        $methods = ['get', 'post', 'put', 'delete', 'options', 'head', 'patch'];
        foreach ($methods as $method) {
            if (array_key_exists($method, $this->data)) {
                $ret[$method] = $this->data[$method];
            }
        }

        return $ret;
    }
}
