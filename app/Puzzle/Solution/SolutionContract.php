<?php

namespace App\Puzzle\Solution;

use App\Puzzle\Answer\Answer;

interface SolutionContract
{
    public function first(): Answer;

    public function second(): Answer;
}
