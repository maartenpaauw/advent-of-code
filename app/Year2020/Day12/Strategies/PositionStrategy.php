<?php

namespace App\Year2020\Day12\Strategies;

use App\Year2020\Day12\PositionContract;

interface PositionStrategy
{
    public function handle(string $action, int $value): PositionContract;
}
