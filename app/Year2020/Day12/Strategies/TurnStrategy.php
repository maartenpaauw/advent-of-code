<?php

namespace App\Year2020\Day12\Strategies;

use App\Year2020\Day12\Position;
use App\Year2020\Day12\PositionContract;

class TurnStrategy implements PositionStrategy
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
        $clockwise = 'R' === $action;

        $point = $this->position
            ->point()
            ->turn($value, $clockwise);

        return new Position(
            $point,
            $this->position->latLng()
        );
    }
}
