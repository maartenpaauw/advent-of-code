<?php

namespace App\Puzzle;

use App\Puzzle\Solution\Solution;

class Puzzle
{
    /**
     * @var Solution
     */
    private $solution;

    public function __construct(Solution $solution)
    {
        $this->solution = $solution;
    }

    public function partOne(): string
    {
        return $this->solution->first();
    }

    public function partTwo(): string
    {
        return $this->solution->second();
    }
}
