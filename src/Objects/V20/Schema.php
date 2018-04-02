<?php
namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class Schema extends Base
{
    protected static $name = 'Schema';

    protected $fields = [
        'allOf' => [
            Base::KEY_TYPE      => Base::ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => AllOf::class,
        ],
        'type' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'required' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Base::TYPE_STRING,
        ],
        'properties' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Parameter::class,
        ],
    ];
}
