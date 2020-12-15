<?php

namespace App\Year2020\Day14;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
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
        $instructions = new Instructions($this->input->content());
        $memory = new Memory();
        $program = new Program($instructions, $memory);

        $binary = $program->run();

        return new IntegerAnswer(bindec($binary));
    }

    public function second(): Answer
    {
        $instructions = new Instructions($this->input->content(), true);
        $memory = new Memory();
        $floatingProgram = new FloatingProgram($instructions, $memory);

        $binary = $floatingProgram->run();

        return new StringAnswer(bindec($binary));
    }
}
