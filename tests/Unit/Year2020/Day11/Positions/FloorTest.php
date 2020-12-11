<?php

namespace Tests\Unit\Year2020\Day11\Positions;

use App\Year2020\Day11\Positions\Floor;
use App\Year2020\Day11\Positions\Position;

class FloorTest extends AbstractPositionTest
{
    public function position(): Position
    {
        return new Floor(1, 2);
    }

    public function string(): string
    {
        return '.';
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
