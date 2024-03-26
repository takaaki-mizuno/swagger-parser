<?php

namespace TakaakiMizuno\SwaggerParser\Exceptions;

class InvalidFormatException extends \Exception
{
    private $object = null;

    public function __construct($message, $object = null, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
