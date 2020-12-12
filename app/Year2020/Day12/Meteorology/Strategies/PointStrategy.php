<?php

namespace App\Year2020\Day12\Meteorology\Strategies;

use App\Year2020\Day12\Meteorology\Point;

interface PointStrategy
{
    public function handle(string $action, int $value): Point;
}
