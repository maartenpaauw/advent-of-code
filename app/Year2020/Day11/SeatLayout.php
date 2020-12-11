<?php

namespace App\Year2020\Day11;

use App\Year2020\Day11\Positions\Position;
use App\Year2020\Day11\Positions\Specifications\AllowedOccupiedNeighboursSpecification;
use App\Year2020\Day11\Positions\Specifications\AllowedVisibleOccupiedSpecification;
use App\Year2020\Day11\Positions\Specifications\AndSpecification;
use App\Year2020\Day11\Positions\Specifications\EmptySeatSpecification;
use App\Year2020\Day11\Positions\Specifications\NoOccupiedNeighboursSpecification;
use App\Year2020\Day11\Positions\Specifications\NoVisibleOccupiedSpecification;
use App\Year2020\Day11\Positions\Specifications\OccupiedSeatSpecification;

class SeatLayout
{
    /**
     * @var string[][]
     */
    private $grid;

    public function __construct(array $grid)
    {
        $this->grid = $grid;
    }

    public function neighbours(int $x, int $y): array
    {
        $neighbours = [];

        for ($i = -1; $i < 2; ++$i) {
            for ($j = -1; $j < 2; ++$j) {
                if (isset($this->grid[$y + $i][$x + $j]) && !(0 === $i && 0 === $j)) {
                    $neighbours[] = $this->grid[$y + $i][$x + $j];
                }
            }
        }

        return $neighbours;
    }

    public function first(): SeatLayout
    {
        $firstRule = new AndSpecification(
            new EmptySeatSpecification(),
            new NoOccupiedNeighboursSpecification($this)
        );

        $secondRule = new AndSpecification(
            new OccupiedSeatSpecification(),
            new AllowedOccupiedNeighboursSpecification($this, 4)
        );

        $grid = [];

        foreach ($this->grid as $y => $row) {
            foreach ($row as $x => $symbol) {
                if ($firstRule->isSatisfiedBy($x, $y, $symbol)) {
                    $grid[$y][$x] = Position::OCCUPIED_SEAT;
                } elseif ($secondRule->isSatisfiedBy($x, $y, $symbol)) {
                    $grid[$y][$x] = Position::EMPTY_SEAT;
                } else {
                    $grid[$y][$x] = $symbol;
                }
            }
        }

        return new SeatLayout($grid);
    }

    public function second(): SeatLayout
    {
        $firstRule = new AndSpecification(
            new EmptySeatSpecification(),
            new NoVisibleOccupiedSpecification($this)
        );

        $secondRule = new AndSpecification(
            new OccupiedSeatSpecification(),
            new AllowedVisibleOccupiedSpecification($this, 5)
        );

        $grid = [];

        foreach ($this->grid as $y => $row) {
            foreach ($row as $x => $symbol) {
                if ($firstRule->isSatisfiedBy($x, $y, $symbol)) {
                    $grid[$y][$x] = Position::OCCUPIED_SEAT;
                } elseif ($secondRule->isSatisfiedBy($x, $y, $symbol)) {
                    $grid[$y][$x] = Position::EMPTY_SEAT;
                } else {
                    $grid[$y][$x] = $symbol;
                }
            }
        }

        return new SeatLayout($grid);
    }

    public function equals(SeatLayout $seatLayout): bool
    {
        return $this->toString() === $seatLayout->toString();
    }

    public function print(): void
    {
        foreach ($this->grid as $row) {
            echo implode($row).PHP_EOL;
        }

        echo PHP_EOL;
    }

    public function toString(): string
    {
        $string = '';

        foreach ($this->grid as $row) {
            $string .= implode($row);
        }

        return $string;
    }

    /**
     * @return string[][]
     */
    public function toArray(): array
    {
        return $this->grid;
    }
}
