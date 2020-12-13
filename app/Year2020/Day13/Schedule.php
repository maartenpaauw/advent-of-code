<?php

namespace App\Year2020\Day13;

class Schedule
{
    /**
     * @var int
     */
    private $every;

    public function __construct(int $every)
    {
        $this->every = $every;
    }

    public function departs(TimestampContract $timestamp): bool
    {
        return 0 === ($timestamp->toInteger() % $this->every);
    }
}
