<?php

namespace App\Year2020\Day8;

use Illuminate\Support\Collection;

class Program
{
    /**
     * @var InstructionList
     */
    private $instructionList;

    public function __construct(InstructionList $instructionList)
    {
        $this->instructionList = $instructionList;
    }

    public function run(): int
    {
        $this->instructionList->rewind();
        $visited = new Collection();
        $accumulator = 0;

        do {
            $instruction = $this->instructionList->current();

            if ('acc' === $instruction->operation()) {
                $accumulator += $instruction->argument();
            }

            $visited->push($this->instructionList->key());
            $this->instructionList->next();
        } while ($this->instructionList->valid() && !$visited->contains($this->instructionList->key()));

        return $accumulator;
    }

    public function terminated(): bool
    {
        return $this->instructionList->key() >= $this->instructionList->count() - 1;
    }
}
