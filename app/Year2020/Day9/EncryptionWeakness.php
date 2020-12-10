<?php

namespace App\Year2020\Day9;

class EncryptionWeakness
{
    /**
     * @var ContiguousRange
     */
    private $range;

    public function __construct(ContiguousRange $range)
    {
        $this->range = $range;
    }

    private function smallest(): int
    {
        return min(...$this->range->toArray());
    }

    private function largest(): int
    {
        return max(...$this->range->toArray());
    }

    public function toInteger(): int
    {
        return $this->smallest() + $this->largest();
    }
}
