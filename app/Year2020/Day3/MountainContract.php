<?php

namespace App\Year2020\Day3;

interface MountainContract
{
    public function isTree(PositionContract $position): bool;

    public function length(): int;
}
