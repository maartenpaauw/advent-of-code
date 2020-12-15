<?php

namespace App\Year2020\Day14;

interface ProgramContract
{
    public function run(): Binary;

    public function apply(BitMaskContract $bitMask): void;

    public function save(Binary $address, Binary $value): void;
}
