<?php

namespace App\Year2020\Day11\Positions\Specifications;

interface PositionSpecification
{
    public function isSatisfiedBy(int $x, int $y, string $symbol): bool;
}
