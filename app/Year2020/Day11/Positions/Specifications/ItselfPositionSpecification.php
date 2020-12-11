<?php

namespace App\Year2020\Day11\Positions\Specifications;

class ItselfPositionSpecification implements PositionSpecification
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

    public function isSatisfiedBy(int $x, int $y, string $symbol): bool
    {
        return $this->x === $x && $this->y === $y;
    }
}
