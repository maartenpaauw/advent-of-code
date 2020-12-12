<?php

namespace App\Year2020\Day12\Geo\Strategies;

use App\Year2020\Day12\Geo\LatLng;
use App\Year2020\Day12\Geo\LatLngContract;

class RotateLatLngStrategy implements LatLngStrategies
{
    /**
     * @var LatLngContract
     */
    private $position;

    public function __construct(LatLngContract $position)
    {
        $this->position = $position;
    }

    public function handle(string $action, int $value): LatLngContract
    {
        $rotatedPosition = $this->position;
        $clockwise = 'R' === $action;

        for ($i = 0; $i < abs($value / 90); ++$i) {
            $rotatedPosition = new LatLng(
                $clockwise ? $rotatedPosition->lng() : -$rotatedPosition->lng(),
                $clockwise ? -$rotatedPosition->lat() : $rotatedPosition->lat()
            );
        }

        return $rotatedPosition;
    }
}
