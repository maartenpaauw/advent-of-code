<?php

namespace App\Year2020\Day9;

class EncryptionWeakness
{
    /**
     * @var ContiguousSet
     */
    private $set;

    public function __construct(ContiguousSet $set)
    {
        $this->set = $set;
    }

    private function smallest(): int
    {
        return min(...$this->set->toArray());
    }

    private function largest(): int
    {
        return max(...$this->set->toArray());
    }

    public function toInteger(): int
    {
        return $this->smallest() + $this->largest();
    }
}
