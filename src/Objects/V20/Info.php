<?php
namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class Info extends Base
{
    protected static $name = 'Info';

    protected $fields = [
        'title' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
        ],
        'description' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'termsOfService' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'contact' => [
            Base::KEY_TYPE      => Contact::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'license' => [
            Base::KEY_TYPE      => License::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
        'version' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
        ],
    ];
}
