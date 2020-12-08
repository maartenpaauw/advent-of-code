<?php

namespace App\Year2020\Day8;

class Instruction implements InstructionContract
{
    private $operation;

    private $argument;

    public function __construct(string $instruction)
    {
        [$this->operation, $this->argument] = explode(' ', $instruction);
    }

    public function operation(): string
    {
        return $this->operation;
    }

    public function argument(): int
    {
        return intval($this->argument);
    }
}
