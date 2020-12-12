<?php

namespace App\Year2020\Day12;

class Ship implements ShipContract
{
    /**
     * @var PositionContract
     */
    private $position;

    public function __construct(PositionContract $position)
    {
        $this->position = $position;
    }

    public function move(string $instruction): void
    {
        $this->position = $this->position->move($instruction);
    }

    public function position(): PositionContract
    {
        return $this->position;
    }
}
