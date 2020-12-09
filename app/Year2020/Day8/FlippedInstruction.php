<?php

namespace App\Year2020\Day8;

class FlippedInstruction implements InstructionContract
{
    /**
     * @var InstructionContract
     */
    private $origin;

    public function __construct(InstructionContract $origin)
    {
        $this->origin = $origin;
    }

    public function operation(): string
    {
        switch ($this->origin->operation()) {
            case 'jmp':
                return 'nop';
            case 'nop':
                return 'jmp';
            default:
                return $this->origin->operation();
        }
    }

    public function argument(): int
    {
        return $this->origin->argument();
    }
}
