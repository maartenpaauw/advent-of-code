<?php

namespace App\Year2020\Day13;

interface Bus
{
    public function id(): int;

    public function departs(TimestampContract $timestamp): bool;

    public function next(TimestampContract $timestamp): Timestamp;
}
