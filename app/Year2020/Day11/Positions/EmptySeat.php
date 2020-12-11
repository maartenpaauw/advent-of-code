<?php

namespace App\Year2020\Day11\Positions;

class EmptySeat extends BasePosition
{
    public function toString(): string
    {
        return Position::EMPTY_SEAT;
    }
}
