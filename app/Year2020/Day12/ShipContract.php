<?php

namespace App\Year2020\Day12;

interface ShipContract
{
    public function move(string $instruction): void;

    public function position(): PositionContract;
}
