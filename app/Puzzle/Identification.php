<?php

namespace App\Puzzle;

use Stringable;

class Identification implements Stringable
{
    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $day;

    public function __construct(int $year, int $day)
    {
        $this->year = $year;
        $this->day = $day;
    }

    public function __toString(): string
    {
        return sprintf('%d.%d', $this->year, $this->day);
    }
}
