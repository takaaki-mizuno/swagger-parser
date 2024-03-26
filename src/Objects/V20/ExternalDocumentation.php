<?php

namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Exceptions\InvalidFormatException;
use TakaakiMizuno\SwaggerParser\Objects\Base;

class ExternalDocumentation extends Base
{
    protected static $name = 'ExternalDocumentation';

    protected $fields = [
        'description' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'url' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
        ],
    ];

    protected function validate($key, $value)
    {
        switch ($key) {
            case 'url':
                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                    throw new InvalidFormatException('Invalid URL Address', $this);
                }
                break;
        }

        return true;
    }
}
