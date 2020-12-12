<?php

namespace App\Year2020\Day12\Geo\Strategies;

use App\Year2020\Day12\Geo\LatLngContract;

interface LatLngStrategies
{
    public function handle(string $action, int $value): LatLngContract;
}
