<?php

namespace App\Year2020\Day14;

class FloatingProgram implements ProgramContract
{
    /**
     * @var Instructions
     */
    private $instructions;

    /**
     * @var Memory
     */
    private $memory;

    /**
     * @var FloatingBitMask
     */
    private $bitMask;

    public function __construct(Instructions $instructions, Memory $memory)
    {
        $this->instructions = $instructions;
        $this->memory = $memory;
    }

    public function run(): Binary
    {
        foreach ($this->instructions as $instruction) {
            $instruction->execute($this);
        }

        return $this->memory->sum();
    }

    public function apply(BitMaskContract $bitMask): void
    {
        $this->bitMask = $bitMask;
    }

    public function save(Binary $address, Binary $value): void
    {
        foreach ($this->bitMask->apply($address) as $item) {
            $this->memory->set($item, $value);
        }
    }
}
