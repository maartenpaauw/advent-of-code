<?php

namespace App\Year2020\Day8;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Solution\SolutionContract;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var Collection
     */
    private $instructions;

    public function __construct(Collection $collection)
    {
        $this->instructions = $collection->map(function (string $instruction) {
            return new Instruction($instruction);
        });
    }

    public function first(): Answer
    {
        $instructionList = new InstructionList($this->instructions->toArray());
        $program = new Program($instructionList);

        return new IntegerAnswer($program->run());
    }

    public function second(): Answer
    {
        $answer = 0;

        /** @var InstructionContract $instruction */
        foreach ($this->instructions as $index => $instruction) {
            $instructionList = new InstructionList($this->instructions->toArray());
            $instructionList->replace($index, new FlippedInstruction($instruction));

            $program = new Program($instructionList);
            $answer = $program->run();

            if ($program->terminated()) {
                break;
            }
        }

        return new IntegerAnswer($answer);
    }
}
