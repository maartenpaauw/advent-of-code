<?php

namespace App\Year2020\Day14;

class MaskInstruction implements Instruction
{
    /**
     * @var string
     */
    private $instruction;

    public function __construct(string $instruction)
    {
        $this->instruction = $instruction;
    }

    public function execute(Program $program): void
    {
        preg_match('/^mask = (?P<mask>[01X]+)$/', $this->instruction, $matches);
        $bitMask = new BitMask($matches['mask']);

        $program->apply($bitMask);
    }
}
