<?php

namespace App\Year2020\Day14;

class MaskInstruction implements Instruction
{
    /**
     * @var string
     */
    private $instruction;

    /**
     * @var bool
     */
    private $floats;


    public function __construct(string $instruction, bool $floats = false)
    {
        $this->instruction = $instruction;
        $this->floats = $floats;
    }

    public function execute(ProgramContract $program): void
    {
        preg_match('/^mask = (?P<mask>[01X]+)$/', $this->instruction, $matches);
        $bitMask = $this->floats ? new FloatingBitMask($matches['mask']) : new BitMask($matches['mask']);

        $program->apply($bitMask);
    }
}
