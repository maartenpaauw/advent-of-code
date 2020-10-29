<?php

namespace App\Puzzle\Identification;

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

    public function year(): int
    {
        return $this->year;
    }

    public function day(): int
    {
        return $this->day;
    }

    public function __toString(): string
    {
        return sprintf('%d.%d', $this->year, $this->day);
    }
}
