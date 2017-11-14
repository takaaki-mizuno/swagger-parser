<?php
namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Objects\Base;

class Operation extends Base
{
    protected static $name = 'Operation';

    protected $fields = [
        'tags' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'summary' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
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
        'operationId' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'consumes' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'produces' => [
            Base::KEY_TYPE      => Base::TYPE_ARRAY,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'parameters' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Parameter::class,
        ],
        'responses' => [
            Base::KEY_TYPE      => Base::TYPE_HASH,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
            Base::KEY_ITEM_TYPE => Response::class,
        ],
    ];
}
