<?php

namespace App\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Position;
use App\Year2020\Day11\SeatLayout;

class NoOccupiedNeighboursSpecification implements PositionSpecification
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
        $neighbours = $this->seatLayout->neighbours($x, $y);

        return !in_array(Position::OCCUPIED_SEAT, $neighbours);
    }
}
