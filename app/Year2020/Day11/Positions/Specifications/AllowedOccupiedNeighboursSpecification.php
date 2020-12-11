<?php

namespace App\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Position;
use App\Year2020\Day11\SeatLayout;

class AllowedOccupiedNeighboursSpecification implements PositionSpecification
{
    /**
     * @var SeatLayout
     */
    private $seatLayout;

    /**
     * @var int
     */
    private $maximum;

    public function __construct(SeatLayout $seatLayout, int $maximum = 4)
    {
        $this->seatLayout = $seatLayout;
        $this->maximum = $maximum;
    }

    public function isSatisfiedBy(int $x, int $y, string $symbol): bool
    {
        $neighbours = $this->seatLayout->neighbours($x, $y);

        return substr_count(implode($neighbours), Position::OCCUPIED_SEAT) >= $this->maximum;
    }
}
