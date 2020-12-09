<?php

namespace App\Year2020\Day9;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\StringAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;

class Solution implements SolutionContract
{
    /**
     * @var XMAS
     */
    private $XMAS;

    public function __construct(Input $input, int $length = 25)
    {
        $this->XMAS = new XMAS($input->content(), $length);
    }

    public function first(): Answer
    {
        do {
            $preamble = $this->XMAS->preamble();
            $current = $this->XMAS->current();

            $this->XMAS->next();
        } while ($this->XMAS->valid() && (new PreambleSpecification($preamble))->isSatisfiedBy($current));

        return new StringAnswer($current);
    }

    public function second(): Answer
    {
        return new StringAnswer('—');
    }
}
