<?php

namespace App\Puzzle\Identification;

use Stringable;

class ClassIdentification implements Stringable
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
        return sprintf('Year%s/Day%d/Solution', $this->origin->year(), $this->origin->day());
    }
}
