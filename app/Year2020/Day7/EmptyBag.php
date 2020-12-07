<?php

namespace App\Year2020\Day7;

class EmptyBag implements Bag
{
    /**
     * @var string
     */
    private $color;

    /**
     * @var int
     */
    private $size;

    public function __construct(string $color, int $size)
    {
        $this->color = $color;
        $this->size = $size;
    }

    public function color(): string
    {
        return $this->color;
    }

    public function size(): int
    {
        return $this->size;
    }

    public function canContain(Bag $bag): bool
    {
        return false;
    }
}
