<?php

namespace App\Year2020\Day5\Contracts;

interface BoardingPassContract
{
    public function seat(): SeatContract;
}
