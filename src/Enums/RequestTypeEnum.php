<?php

namespace Wesley0010012\HttpRequest\Enums;

class RequestTypeEnum
{
    public $value;

    private static $instances = [];

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function GET(): self
    {
        return self::getInstance('GET');
    }
    public static function POST(): self
    {
        return self::getInstance('POST');
    }
    public static function PUT(): self
    {
        return self::getInstance('PUT');
    }
    public static function DELETE(): self
    {
        return self::getInstance('DELETE');
    }
    public static function PATCH(): self
    {
        return self::getInstance('PATCH');
    }

    private static function getInstance(string $value): self
    {
        return self::$instances[$value] ??= new self($value);
    }
}
