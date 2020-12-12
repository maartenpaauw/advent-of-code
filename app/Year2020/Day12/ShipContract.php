<?php

namespace App\Year2020\Day12;

use App\Year2020\Day12\Geo\LatLngContract;

interface ShipContract
{
    public function move(string $instruction): ShipContract;

    public function position(): LatLngContract;
}
