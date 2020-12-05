<?php

namespace App\Year2020\Day5\Contracts;

interface SeatSpecification
{
    public function isSatisfiedBy(SeatContract $seat): bool;
}
