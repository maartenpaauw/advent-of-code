<?php

namespace App\Year2020\Day8;

interface InstructionContract
{
    public function operation(): string;

    public function argument(): int;
}
