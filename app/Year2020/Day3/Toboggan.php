<?php

namespace App\Year2020\Day3;

class Toboggan
{
    /**
     * @var SlopeContract
     */
    private $slope;

    /**
     * @var MountainContract
     */
    private $mountain;

    /**
     * @var PositionContract
     */
    private $position;

    /**
     * @var int
     */
    private $trees;

    public function __construct(SlopeContract $slope, MountainContract $mountain, PositionContract $position)
    {
        $this->slope = $slope;
        $this->mountain = $mountain;
        $this->position = $position;
        $this->trees = 0;
    }

    public function slide(): self
    {
        do {
            if ($this->mountain->isTree($this->position)) {
                ++$this->trees;
            }

            $this->position = $this->position->move($this->slope);
        } while ($this->position->y() < $this->mountain->length());

        return $this;
    }

    public function trees(): int
    {
        return $this->trees;
    }
}
