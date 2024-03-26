<?php

namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class Document extends Base
{
    protected static $name = 'Document';

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
            Base::KEY_ITEM_TYPE => Base::TYPE_STRING,
        ],
        'consumes' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Base::TYPE_STRING,
        ],
        'produces' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Base::TYPE_STRING,
        ],
        'paths' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => PathItem::class,
        ],
        'definitions' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Schema::class,
        ],
        'parameters' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Parameter::class,
        ],
        'responses' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Parameter::class,
        ],
        'security' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Parameter::class,
        ],
        'tags' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Tag::class,
        ],
        'externalDocs' => [
            Base::KEY_TYPE      => ExternalDocumentation::class,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => true,
        ],
    ];
}
