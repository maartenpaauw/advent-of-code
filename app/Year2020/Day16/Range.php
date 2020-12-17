<?php

namespace App\Year2020\Day16;

class Range
{
    /**
     * @var int
     */
    private $from;

    /**
     * @var int
     */
    private $to;

    public function __construct(string $range)
    {
        [$this->from, $this->to] = explode('-', $range);
    }

    public function from(): int
    {
        return $this->from;
    }

    public function to(): int
    {
        return $this->to;
    }
}
