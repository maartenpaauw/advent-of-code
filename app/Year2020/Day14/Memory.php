<?php

namespace App\Year2020\Day14;

class Memory
{
    /**
     * @var Binary[]
     */
    private $storage;

    public function __construct()
    {
        $this->storage = [];
    }

    public function set(Binary $address, Binary $value): void
    {
        $this->storage[(string) $address] = $value;
    }

    public function sum(): Binary
    {
        return array_reduce($this->storage, function (Binary $sum, Binary $value) {
            return $sum->sum($value);
        }, new Binary('0'));
    }
}
