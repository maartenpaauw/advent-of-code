<?php

namespace App\Year2020\Day12\Strategies;

use App\Year2020\Day12\LatLng;
use App\Year2020\Day12\Position;
use App\Year2020\Day12\PositionContract;

class MoveForwardStrategy implements PositionStrategy
{
    /**
     * @var PositionContract
     */
    private $position;

    public function __construct(PositionContract $position)
    {
        $this->position = $position;
    }

    public function handle(string $action, int $value): PositionContract
    {
        $lat = $this->position->latLng()->lat();
        $lng = $this->position->latLng()->lng();

        if ('N' === $this->position->point()->label()) {
            $lng = $lng + $value;
        } elseif ('E' === $this->position->point()->label()) {
            $lat = $lat + $value;
        } elseif ('S' === $this->position->point()->label()) {
            $lng = $lng - $value;
        } elseif ('W' === $this->position->point()->label()) {
            $lat = $lat - $value;
        }

        return new Position(
            $this->position->point(),
            new LatLng($lat, $lng)
        );
    }
}
