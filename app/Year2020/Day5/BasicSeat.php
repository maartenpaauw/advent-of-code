<?php

namespace App\Year2020\Day5;

use App\Year2020\Day5\Contracts\SeatContract;

class BasicSeat implements SeatContract
{
    /**
     * @var int
     */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id;
    }
}
