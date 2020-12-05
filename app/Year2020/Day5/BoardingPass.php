<?php

namespace App\Year2020\Day5;

use App\Year2020\Day5\Contracts\BoardingPassContract;
use App\Year2020\Day5\Contracts\SeatContract;

class BoardingPass implements BoardingPassContract
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function seat(): SeatContract
    {
        return new Seat(
            new Row(substr($this->value, 0, 7)),
            new Column(substr($this->value, 7, 3))
        );
    }
}
