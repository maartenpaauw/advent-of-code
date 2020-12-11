<?php

namespace App\Year2020\Day11;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;
use App\Year2020\Day11\Positions\Position;

class Solution implements SolutionContract
{
    /**
     * @var string[][]
     */
    private $grid;

    public function __construct(Input $input)
    {
        $this->grid = array_map(function (string $row) {
            return str_split($row);
        }, $input->content());
    }

    public function first(): Answer
    {
        $seatLayout = new SeatLayout($this->grid);

        do {
            $current = $seatLayout;
            $seatLayout = $current->first();
        } while (!$current->equals($seatLayout));

        $count = substr_count($seatLayout->toString(), Position::OCCUPIED_SEAT);

        return new IntegerAnswer($count);
    }

    public function second(): Answer
    {
        $seatLayout = new SeatLayout($this->grid);

        do {
            $current = $seatLayout;
            $seatLayout = $current->second();
        } while (!$current->equals($seatLayout));

        $count = substr_count($seatLayout->toString(), Position::OCCUPIED_SEAT);

        return new IntegerAnswer($count);
    }
}
