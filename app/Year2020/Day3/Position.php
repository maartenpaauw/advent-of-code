<?php

namespace App\Year2020\Day3;

class Position implements PositionContract
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function move(SlopeContract $slope): PositionContract
    {
        return new static($this->x + $slope->right(), $this->y + $slope->down());
    }
}
