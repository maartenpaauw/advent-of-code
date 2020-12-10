<?php

namespace App\Year2020\Day9;

class ContiguousRange
{
    /**
     * @var array
     */
    private $numbers;

    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }

    public function sum(): int
    {
        return array_sum($this->numbers);
    }

    public function toArray(): array
    {
        return $this->numbers;
    }
}
