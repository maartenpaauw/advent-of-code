<?php

namespace App\Puzzle\Solution;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\StringAnswer;

class FakeSolution implements SolutionContract
{
    public function first(): Answer
    {
        return new StringAnswer('1');
    }

    public function second(): Answer
    {
        return new StringAnswer('2');
    }
}
