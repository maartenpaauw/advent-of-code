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
    private $xmas;

    /**
     * @var ContiguousSets
     */
    private $contiguousSets;

    public function __construct(Input $input, int $length = 25)
    {
        $this->xmas = new XMAS($input->content(), $length);
        $this->contiguousSets = new ContiguousSets($input->content());
    }

    public function first(): Answer
    {
        $invalidNumber = new InvalidNumber($this->xmas);

        return new IntegerAnswer($invalidNumber->toInteger());
    }

    public function second(): Answer
    {
        $invalidNumber = new InvalidNumber($this->xmas);

        do {
            $contiguousRange = $this->contiguousSets->current();
            $this->contiguousSets->next();
        } while ($this->contiguousSets->valid() && $contiguousRange->sum() !== $invalidNumber->toInteger());

        return new IntegerAnswer((new EncryptionWeakness($contiguousRange))->toInteger());
    }
}
