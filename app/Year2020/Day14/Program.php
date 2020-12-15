<?php

namespace App\Year2020\Day14;

class Program
{
    /**
     * @var Instructions
     */
    private $instructions;

    /**
     * @var BitMask
     */
    private $bitMask;

    /**
     * @var Memory
     */
    private $memory;

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

    public function apply(BitMask $bitMask): void
    {
        $this->bitMask = $bitMask;
    }

    public function save(Binary $address, Binary $value): void
    {
        $value = $this->bitMask->apply($value);

        $this->memory->set($address, $value);
    }
}
