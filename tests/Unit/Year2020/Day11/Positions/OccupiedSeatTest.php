<?php

namespace Tests\Unit\Year2020\Day11\Positions;

use App\Year2020\Day11\Positions\OccupiedSeat;
use App\Year2020\Day11\Positions\Position;

class OccupiedSeatTest extends AbstractPositionTest
{
    public function position(): Position
    {
        return new OccupiedSeat(1, 2);
    }

    public function string(): string
    {
        return '#';
    }

    public function x(): int
    {
        return 1;
    }

    public function y(): int
    {
        return 2;
    }
}
