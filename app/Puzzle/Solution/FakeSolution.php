<?php

namespace App\Puzzle\Solution;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\StringAnswer;
use App\Puzzle\Input\Input;

class FakeSolution implements Solution
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
        return new StringAnswer('1');
    }

    public function second(): Answer
    {
        return new StringAnswer('2');
    }
}
