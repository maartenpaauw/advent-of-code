<?php

namespace App\Year2020\Day12;

class WaypointShip implements ShipContract
{
    /**
     * @var LatLngContract
     */
    private $waypoint;

    public function __construct(LatLngContract $waypoint)
    {
        $this->waypoint = $waypoint;
    }

    public function move(string $instruction): void
    {

    }

    public function position(): PositionContract
    {
        return new Position(
            new CardinalPoint('E'),
            new LatLng(1, 1)
        );
    }
}
