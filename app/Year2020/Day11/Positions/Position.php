<?php

namespace App\Year2020\Day11\Positions;

interface Position
{
    public const FLOOR = '.';
    public const EMPTY_SEAT = 'L';
    public const OCCUPIED_SEAT = '#';

    public function x(): int;

    public function y(): int;

    public function toString(): string;
}
