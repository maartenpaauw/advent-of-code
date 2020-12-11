<?php

namespace App\Year2020\Day11\Positions;

class OccupiedSeat extends BasePosition
{
    public function toString(): string
    {
        return Position::OCCUPIED_SEAT;
    }
}
