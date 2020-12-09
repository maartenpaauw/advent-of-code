<?php

namespace App\Year2020\Day9;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;

class Solution implements SolutionContract
{
    /**
     * @var XMAS
     */
    private $XMAS;

    /**
     * @var ContiguousSets
     */
    private $contiguousSets;

    public function __construct(Input $input, int $length = 25)
    {
        $this->XMAS = new XMAS($input->content(), $length);
        $this->contiguousSets = new ContiguousSets($input->content());
    }

    public function first(): Answer
    {
        $invalidNumber = new InvalidNumber($this->XMAS);

        return new IntegerAnswer($invalidNumber->toInteger());
    }

    public function second(): Answer
    {
        $invalidNumber = new InvalidNumber($this->XMAS);

        do {
            $contiguousSet = $this->contiguousSets->current();
            $this->contiguousSets->next();
        } while ($this->contiguousSets->valid() && $contiguousSet->sum() !== $invalidNumber->toInteger());

        return new IntegerAnswer((new EncryptionWeakness($contiguousSet))->toInteger());
    }
}
