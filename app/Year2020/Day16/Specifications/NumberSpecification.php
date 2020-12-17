<?php

namespace App\Year2020\Day16\Specifications;

interface NumberSpecification
{
    public function isSatisfiedBy(int $number): bool;
}
