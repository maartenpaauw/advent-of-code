<?php

namespace App\Year2020\Day7;

interface Bag
{
    public function color(): string;

    public function size(): int;

    public function canContain(Bag $bag): bool;
}
