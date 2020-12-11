<?php

namespace App\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Position;
use App\Year2020\Day11\SeatLayout;

class AllowedVisibleOccupiedSpecification implements PositionSpecification
{
    /**
     * @var SeatLayout
     */
    private $seatLayout;

    /**
     * @var int
     */
    private $maximum;

    public function __construct(SeatLayout $seatLayout, $maximum = 5)
    {
        $this->seatLayout = $seatLayout;
        $this->maximum = $maximum;
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
                $found = $this->seatLayout->toArray()[$y + $dy][$x + $dx];

                if (Position::FLOOR !== $found) {
                    if (Position::OCCUPIED_SEAT === $found) {
                        ++$count;
                    }

                    break;
                }

                $dx += $ddx;
                $dy += $ddy;
            }
        }

        return $count >= $this->maximum;
    }
}
