<?php

namespace App\Year2020\Day3;

interface PositionContract
{
    public function x(): int;

    public function y(): int;

    public function move(SlopeContract $slope): PositionContract;
}
