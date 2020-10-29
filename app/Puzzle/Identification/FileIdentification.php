<?php

namespace App\Puzzle\Identification;

use Stringable;

class FileIdentification implements Stringable
{
    /**
     * @var Identification
     */
    private $origin;

    public function __construct(Identification $origin)
    {
        $this->origin = $origin;
    }

    public function __toString(): string
    {
        return sprintf('input/%s/%s.txt', $this->origin->year(), $this->origin->day());
    }
}
