<?php

namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class Tag extends Base
{
    protected static $name = 'Tag';

    protected $fields = [
        'name' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
        ],
        'description' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'externalDocs' => [
            Base::KEY_TYPE      => ExternalDocumentation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
    ];
}
