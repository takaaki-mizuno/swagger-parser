<?php

namespace TakaakiMizuno\SwaggerParser\Objects\V20;

use TakaakiMizuno\SwaggerParser\Exceptions\InvalidFormatException;
use TakaakiMizuno\SwaggerParser\Objects\Base;

class Header extends Base
{
    protected static $name = 'Header';

    protected $validTypes = ['string', 'number', 'integer', 'boolean', 'array'];

    protected $fields = [
        'description' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
        'type' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => true,
            Base::KEY_IS_OBJECT => false,
        ],
        'format' => [
            Base::KEY_TYPE      => Base::TYPE_STRING,
            Base::KEY_REQUIRED  => false,
            Base::KEY_IS_OBJECT => false,
        ],
    ];

    protected function validate($key, $value)
    {
        switch ($key) {
            case 'type':
                if (!in_array($key, $this->validTypes)) {
                    throw new InvalidFormatException('Invalid Type Value', $this);
                }
                break;
        }

        return true;
    }
}
