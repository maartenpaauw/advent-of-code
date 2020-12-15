<?php

namespace App\Year2020\Day14;

interface Instruction
{
    public function execute(ProgramContract $program): void;
}
