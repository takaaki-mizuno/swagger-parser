<?php
namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class SecurityRequirement extends Base
{
    protected static $name = 'SecurityRequirement';

    protected $fields = [
        'swagger' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
        ],
        'info' => [
            Base::KEY_TYPE      => Info::class,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => true,
        ],
        'host' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'basePath' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'schemes' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
    ];
}
