<?php

namespace App\Year2020\Day12;

use App\Year2020\Day12\Geo\LatLng;
use App\Year2020\Day12\Geo\LatLngContract;
use App\Year2020\Day12\Geo\Strategies\MoveForwardStrategy;
use App\Year2020\Day12\Geo\Strategies\MoveToDirectionStrategy;
use App\Year2020\Day12\Meteorology\Point;
use App\Year2020\Day12\Meteorology\Strategies\RotatePointStrategy;

class Ship implements ShipContract
{
    /**
     * @var Point
     */
    private $orientation;

    /**
     * @var LatLng
     */
    private $position;

    public function __construct(Point $orientation, LatLng $position)
    {
        $this->orientation = $orientation;
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

        $newOrientation = $this->orientation;
        $newPosition = $this->position;

        if (isset($matches['turn'])) {
            $newOrientation = (new RotatePointStrategy($this->orientation))->handle($matches['turn'], $value);
        } elseif (isset($matches['forward'])) {
            $newPosition = (new MoveToDirectionStrategy($this->position))->handle($this->orientation->label(), $value);
        } elseif (isset($matches['move'])) {
            $newPosition = (new MoveToDirectionStrategy($this->position))->handle($matches['move'], $value);
        }

        return new Ship(
            $newOrientation,
            $newPosition
        );
    }

    public function position(): LatLngContract
    {
        return $this->position;
    }
}
