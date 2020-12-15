<?php

namespace App\Year2020\Day14;

class MemoryInstruction implements Instruction
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
        preg_match('/^mem\[(?P<address>\d+)] = (?<value>\d+)$/', $this->instruction, $matches);

        $address = Binary::fromInteger($matches['address']);
        $value = Binary::fromInteger($matches['value']);

        $program->save($address, $value);
    }
}
