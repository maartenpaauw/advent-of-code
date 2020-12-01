<?php

namespace App\AoC\Days;

interface Days
{
    public function first(): int;

    public function last(): int;

    public function toArray(): array;
}
