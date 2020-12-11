<?php

namespace App\Year2020\Day11\Positions\Specifications;

class NotSpecification implements PositionSpecification
{
    /**
     * @var PositionSpecification
     */
    private $specification;

    public function __construct(PositionSpecification $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy(int $x, int $y, string $symbol): bool
    {
        return !$this->specification->isSatisfiedBy($x, $y, $symbol);
    }
}
