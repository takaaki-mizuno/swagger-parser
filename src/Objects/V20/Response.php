<?php
namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class Response extends Base
{
    protected static $name = 'Response';

    protected $fields = [
        'description' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
        ],
        'schema' => [
            Base::KEY_TYPE      => Schema::class,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => true,
        ],
        'headers' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Header::class,
        ],
        'examples' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Base::TYPE_STRING,
        ],
    ];
}
