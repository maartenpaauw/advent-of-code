<?php

namespace App\Year2020\Day13;

class Timestamp implements TimestampContract
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function increment(): TimestampContract
    {
        return $this->add(1);
    }

    public function add(int $amount): TimestampContract
    {
        return new Timestamp($this->value + $amount);
    }

    public function difference(TimestampContract $timestamp): int
    {
        return $this->toInteger() - $timestamp->toInteger();
    }

    public function toInteger(): int
    {
        return $this->value;
    }
}
