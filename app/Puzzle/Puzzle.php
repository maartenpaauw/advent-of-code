<?php

namespace App\Puzzle;

use App\Puzzle\Solution\SolutionContract;

class Puzzle
{
    /**
     * @var SolutionContract
     */
    private $solution;

    public function __construct(SolutionContract $solution)
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
