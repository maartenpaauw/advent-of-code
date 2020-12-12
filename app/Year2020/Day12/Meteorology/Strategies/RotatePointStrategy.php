<?php

namespace App\Year2020\Day12\Meteorology\Strategies;

use App\Year2020\Day12\Meteorology\Point;

class RotatePointStrategy implements PointStrategy
{
    /**
     * @var Point
     */
    private $point;

    public function __construct(Point $point)
    {
        $this->point = $point;
    }

    public function handle(string $action, int $value): Point
    {
        $clockwise = 'R' === $action;

        return $this->point->turn($value, $clockwise);
    }
}
