<?php

namespace App\Year2020\Day3;

class Slope implements SlopeContract
{
    /**
     * @var int
     */
    private $right;

    /**
     * @var int
     */
    private $down;

    public function __construct(int $right, int $down)
    {
        $this->right = $right;
        $this->down = $down;
    }

    public function right(): int
    {
        return $this->right;
    }

    public function down(): int
    {
        return $this->down;
    }
}
