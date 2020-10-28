<?php

namespace App\Year2020\Day1;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\StringAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;

class Solution implements SolutionContract
{
    /**
     * @var Input
     */
    private $input;

    public function __construct(Input $input)
    {
        $this->input = $input;
    }

    public function first(): Answer
    {
        return new StringAnswer('—');
    }

    public function second(): Answer
    {
        return new StringAnswer('—');
    }
}
