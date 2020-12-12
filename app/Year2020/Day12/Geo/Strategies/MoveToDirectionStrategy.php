<?php

namespace App\Year2020\Day12\Geo\Strategies;

use App\Year2020\Day12\Geo\LatLng;
use App\Year2020\Day12\Geo\LatLngContract;
use App\Year2020\Day12\Meteorology\Point;

class MoveToDirectionStrategy implements LatLngStrategies
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
        $lat = $this->position->lat();
        $lng = $this->position->lng();

        if ('N' === $action) {
            $lng = $lng + $value;
        } elseif ('E' === $action) {
            $lat = $lat + $value;
        } elseif ('S' === $action) {
            $lng = $lng - $value;
        } elseif ('W' === $action) {
            $lat = $lat - $value;
        }

        return new LatLng(
            $lat,
            $lng
        );
    }
}
