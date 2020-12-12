<?php

namespace App\Year2020\Day12;

use App\Year2020\Day12\Geo\LatLng;
use App\Year2020\Day12\Geo\LatLngContract;
use App\Year2020\Day12\Geo\Strategies\MoveToDirectionStrategy;
use App\Year2020\Day12\Geo\Strategies\MoveToLatLngStrategy;
use App\Year2020\Day12\Geo\Strategies\RotateLatLngStrategy;

class WaypointShip implements ShipContract
{
    /**
     * @var LatLngContract
     */
    private $waypoint;

    /**
     * @var LatLngContract
     */
    private $position;

    public function __construct(LatLngContract $waypoint, LatLngContract $position)
    {
        $this->waypoint = $waypoint;
        $this->position = $position;
    }

    public function move(string $instruction): ShipContract
    {
        $validInstruction = preg_match(
            '/^((?<turn>[LR])|(?<move>[NESW])|(?<forward>[F]))(?<value>\d+)$/',
            $instruction,
            $matches,
            PREG_UNMATCHED_AS_NULL
        );

        if (!$validInstruction) {
            return $this;
        }

        $value = $matches['value'];

        $newWaypoint = $this->waypoint;
        $newPosition = $this->position;

        if (isset($matches['move'])) {
            $newWaypoint = (new MoveToDirectionStrategy($this->waypoint))->handle($matches['move'], $value);
        } elseif (isset($matches['forward'])) {
            $newPosition = (new MoveToLatLngStrategy($this->position, $this->waypoint))->handle($matches['forward'], $value);
        } elseif (isset($matches['turn'])) {
            $newWaypoint = (new RotateLatLngStrategy($this->waypoint))->handle($matches['turn'], $value);
        }

        return new WaypointShip(
            $newWaypoint,
            $newPosition
        );
    }

    public function position(): LatLngContract
    {
        return $this->position;
    }
}
