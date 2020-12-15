<?php

namespace App\Year2020\Day14;

class BitMask implements BitMaskContract
{
    /**
     * @var Binary
     */
    private $a;

    /**
     * @var Binary
     */
    private $b;

    public function __construct(string $mask)
    {
        $this->a = new Binary(str_replace('X', 0, $mask));
        $this->b = new Binary(str_replace('X', 1, $mask));
    }

    public function apply(Binary $binary): Binary
    {
        return $this->a->or($this->b->and($binary));
    }
}
