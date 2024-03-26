<?php

namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class AllOf extends Base
{
    protected static $name = 'AllOf';

    protected $fields = [
        '$ref' => [
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
            Base::KEY_ITEM_TYPE => Property::class,
        ],
    ];
}
