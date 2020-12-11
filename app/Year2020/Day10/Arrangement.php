<?php

namespace App\Year2020\Day10;

class Arrangement
{
    /**
     * @var int
     */
    private $until;

    /**
     * @var int
     */
    private $ways;

    public function __construct(int $until, int $ways)
    {
        $this->until = $until;
        $this->ways = $ways;
    }

    public function until(): int
    {
        return $this->until;
    }

    public function ways(): int
    {
        return $this->ways;
    }
}
