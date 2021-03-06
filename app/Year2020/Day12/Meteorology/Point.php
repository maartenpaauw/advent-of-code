<?php

namespace App\Year2020\Day12\Meteorology;

interface Point
{
    public function label(): string;

    public function degrees(): int;

    public function turn(int $degrees, bool $clockwise = true): Point;
}
