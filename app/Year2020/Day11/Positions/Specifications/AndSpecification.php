<?php

namespace App\Year2020\Day11\Positions\Specifications;

class AndSpecification implements PositionSpecification
{
    /**
     * @var PositionSpecification[]
     */
    private $specifications;

    public function __construct(PositionSpecification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(int $x, int $y, string $symbol): bool
    {
        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($x, $y, $symbol)) {
                return false;
            }
        }

        return true;
    }
}
