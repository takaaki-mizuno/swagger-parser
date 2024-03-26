<?php

namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Exceptions\InvalidFormatException;
use TakaakiMizuno\SwaggerParser\Objects\Base;

class Contact extends Base
{
    protected static $name = 'Contact';

    protected $fields = [
        'name' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'url' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'email' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
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
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    throw new InvalidFormatException('Invalid Email Address', $this);
                }
                break;
        }

        return true;
    }
}
