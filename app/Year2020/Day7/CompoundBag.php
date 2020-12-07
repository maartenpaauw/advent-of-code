<?php

namespace App\Year2020\Day7;

class CompoundBag implements Bag
{
    /**
     * @var string
     */
    private $color;

    /**
     * @var Bag[]
     */
    private $bags;

    /**
     * @var int
     */
    private $size;

    public function __construct(string $color, int $size)
    {
        $this->color = $color;
        $this->size = $size;
        $this->bags = [];
    }

    public function color(): string
    {
        return $this->color;
    }

    public function add(Bag $bag): void
    {
        $this->bags[] = $bag;
    }

    public function canContain(Bag $bag): bool
    {
        foreach ($this->bags as $child) {
            if ($child->color() === $bag->color() || $child->canContain($bag)) {
                return true;
            }
        }

        return false;
    }

    public function size(): int
    {
        $total = $this->size;

        foreach ($this->bags as $bag) {
            $total = $total + ($this->size * $bag->size());
        }

        return $total;
    }
}
