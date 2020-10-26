<?php

namespace App\Puzzle\Solution;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Input\Input;

interface Solution
{
    public function __construct(Input $input);
    public function first(): Answer;
    public function second(): Answer;
}
