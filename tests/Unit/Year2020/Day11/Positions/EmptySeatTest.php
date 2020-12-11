<?php

namespace Tests\Unit\Year2020\Day11\Positions;

use App\Year2020\Day11\Positions\EmptySeat;
use App\Year2020\Day11\Positions\Position;

class EmptySeatTest extends AbstractPositionTest
{
    public function position(): Position
    {
        return new EmptySeat(1, 2);
    }

    public function string(): string
    {
        return 'L';
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
