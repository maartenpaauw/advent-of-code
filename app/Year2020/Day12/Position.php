<?php

namespace App\Year2020\Day12;

use App\Year2020\Day12\Strategies\MoveForwardStrategy;
use App\Year2020\Day12\Strategies\RotateToDirectionStrategy;
use App\Year2020\Day12\Strategies\TurnStrategy;

class Position implements PositionContract
{
    /**
     * @var Point
     */
    private $point;

    /**
     * @var LatLngContract
     */
    private $latLng;

    public function __construct(Point $point, LatLngContract $latLng)
    {
        $this->point = $point;
        $this->latLng = $latLng;
    }

    public function point(): Point
    {
        return $this->point;
    }

    public function latLng(): LatLngContract
    {
        return $this->latLng;
    }

    public function move(string $instruction): PositionContract
    {
        preg_match(
            '/^((?<turn>[LR])|(?<move>[NESW])|(?<forward>[F]))(?<value>\d+)$/',
            $instruction,
            $matches,
            PREG_UNMATCHED_AS_NULL
        );

        if (isset($matches['move'])) {
            return (new RotateToDirectionStrategy($this))->handle($matches['move'], $matches['value']);
        }

        if (isset($matches['forward'])) {
            return (new MoveForwardStrategy($this))->handle($matches['forward'], $matches['value']);
        }

        if (isset($matches['turn'])) {
            return (new TurnStrategy($this))->handle($matches['turn'], $matches['value']);
        }

        return $this;
    }
}
