<?php

namespace App\Year2020\Day15;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Answer\StringAnswer;
use App\Puzzle\Solution\SolutionContract;

class Solution implements SolutionContract
{
    /**
     * @var int[]
     */
    private $input;

    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function first(): Answer
    {
        $memory = array_combine(array_slice($this->input, 0, count($this->input) - 1), range(1, count($this->input) - 1));
        $turn = count($this->input);
        $previous = end($this->input);

        do {
            if (!array_key_exists($previous, $memory)) {
                $memory[$previous] = $turn;
                $previous = 0;
            } else {
                $difference = $turn - $memory[$previous];
                $memory[$previous] = $turn;
                $previous = $difference;
            }

            ++$turn;
        } while ($turn < 2020);

        return new IntegerAnswer($previous);
    }

    public function second(): Answer
    {
        $memory = array_combine(array_slice($this->input, 0, count($this->input) - 1), range(1, count($this->input) - 1));
        $turn = count($this->input);
        $previous = end($this->input);

        do {
            if (!array_key_exists($previous, $memory)) {
                $memory[$previous] = $turn;
                $previous = 0;
            } else {
                $difference = $turn - $memory[$previous];
                $memory[$previous] = $turn;
                $previous = $difference;
            }

            ++$turn;
        } while ($turn < 30000000);

        return new IntegerAnswer($previous);
    }
}
