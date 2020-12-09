<?php

namespace App\Year2020\Day9;

interface NumberSpecification
{
    public function isSatisfiedBy(int $number): bool;
}
