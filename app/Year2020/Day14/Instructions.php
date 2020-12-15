<?php

namespace App\Year2020\Day14;

use Iterator;

class Instructions implements Iterator
{
    /**
     * @var string[]
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

    public function current(): Instruction
    {
        $instruction = $this->instructions[$this->key()];

        preg_match('/^(?P<instruction>mask|mem)/', $instruction, $matches);

        if ('mask' === $matches['instruction']) {
            return new MaskInstruction($instruction);
        } else {
            return new MemoryInstruction($instruction);
        }
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->instructions[$this->key()]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
