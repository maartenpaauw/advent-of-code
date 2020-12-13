<?php

namespace App\Year2020\Day13;

interface TimestampContract
{
    public function increment(): TimestampContract;

    public function add(int $amount): TimestampContract;

    public function difference(TimestampContract $timestamp): int;

    public function toInteger(): int;
}
