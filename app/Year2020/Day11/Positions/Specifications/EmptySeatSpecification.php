<?php

namespace App\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Position;

class EmptySeatSpecification implements PositionSpecification
{
    public function isSatisfiedBy(int $x, int $y, string $symbol): bool
    {
        return Position::EMPTY_SEAT === $symbol;
    }
}
