<?php

namespace App\AoC\Days;

use Carbon\CarbonInterface;
use Stringable;

class LatestDay implements Stringable
{
    /**
     * @var CarbonInterface
     */
    private $carbon;

    /**
     * @var Days
     */
    private $days;

    public function __construct(CarbonInterface $carbon, Days $days)
    {
        $this->carbon = $carbon;
        $this->days = $days;
    }

    public function __toString(): string
    {
        return min($this->carbon->day, $this->days->last());
    }
}
