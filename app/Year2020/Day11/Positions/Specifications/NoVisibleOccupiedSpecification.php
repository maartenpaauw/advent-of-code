<?php

namespace App\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Position;
use App\Year2020\Day11\SeatLayout;

class NoVisibleOccupiedSpecification implements PositionSpecification
{
    /**
     * @var SeatLayout
     */
    private $seatLayout;

    public function __construct(SeatLayout $seatLayout)
    {
        $this->seatLayout = $seatLayout;
    }

    public function isSatisfiedBy(int $x, int $y, string $symbol): bool
    {
        $directions = [
            [-1, -1],
            [-1, 0],
            [-1, 1],
            [0, -1],
            [0, 1],
            [1, -1],
            [1, 0],
            [1, 1],
        ];

        $count = 0;

        foreach ($directions as $direction) {
            [$dy, $dx] = $direction;
            [$ddy, $ddx] = $direction;

            while (isset($this->seatLayout->toArray()[$y + $dy][$x + $dx])) {
                if (Position::FLOOR !== $this->seatLayout->toArray()[$y + $dy][$x + $dx]) {
                    if (Position::OCCUPIED_SEAT === $this->seatLayout->toArray()[$y + $dy][$x + $dx]) {
                        ++$count;
                    }

                    break;
                }

                $dx += $ddx;
                $dy += $ddy;
            }
        }

        return 0 === $count;
    }
}
