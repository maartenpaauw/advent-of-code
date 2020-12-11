<?php

namespace App\Year2020\Day10\Composite;


interface Output
{
    public function rating(): int;

    public function difference(): array;
}
