<?php

namespace App\Year2020\Day14;

use Stringable;

class Binary implements Stringable
{
    /**
     * @var string
     */
    private $bits;

    public function __construct(string $bits)
    {
        $this->bits = $bits;
    }

    public static function fromInteger(int $value): Binary
    {
        return new Binary(str_pad(decbin($value), 36, '0', STR_PAD_LEFT));
    }

    public function or(Binary $binary): Binary
    {
        return new Binary((string) $this | (string) $binary);
    }

    public function and(Binary $binary): Binary
    {
        return new Binary((string) $this & (string) $binary);
    }

    public function sum(Binary $binary): Binary
    {
        return new Binary(decbin(bindec($binary) + bindec($this)));
    }

    public function __toString(): string
    {
        return $this->bits;
    }
}
