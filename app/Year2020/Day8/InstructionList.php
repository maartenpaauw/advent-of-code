<?php

namespace App\Year2020\Day8;

use Iterator;

class InstructionList implements Iterator
{
    /**
     * @var InstructionContract[]
     */
    private $instructions;

    /**
     * @var int
     */
    private $position;

    public function __construct(array $instructions)
    {
        $this->instructions = $instructions;
        $this->position = 0;
    }

    public function current(): InstructionContract
    {
        return $this->instructions[$this->position];
    }

    public function next()
    {
        if ('jmp' === $this->current()->operation()) {
            $this->position += $this->current()->argument();
            return;
        }

        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->instructions[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function replace(int $index, InstructionContract $instruction): void
    {
        $this->instructions[$index] = $instruction;
    }

    public function count(): int
    {
        return count($this->instructions);
    }
}
