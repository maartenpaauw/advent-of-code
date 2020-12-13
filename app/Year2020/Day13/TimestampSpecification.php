<?php

namespace App\Year2020\Day13;

interface TimestampSpecification
{
    public function isSatisfiedBy(TimestampContract $timestamp): bool;
}
