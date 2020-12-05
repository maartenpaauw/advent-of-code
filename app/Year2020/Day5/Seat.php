<?php

namespace App\Year2020\Day5;

use App\Year2020\Day5\Contracts\CoordinateContract;
use App\Year2020\Day5\Contracts\SeatContract;

class Seat implements SeatContract
{
    /**
     * @var CoordinateContract
     */
    private $row;

    /**
     * @var CoordinateContract
     */
    private $column;

    public function __construct(CoordinateContract $row, CoordinateContract $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    public function id(): int
    {
        return $this->row->number() * 8 + $this->column->number();
    }
}
