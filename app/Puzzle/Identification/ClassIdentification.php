<?php

namespace App\Puzzle\Identification;

class ClassIdentification extends IdentificationDecorator
{
    public function __toString(): string
    {
        return sprintf('Year%s/Day%d/Solution', $this->origin->year(), $this->origin->day());
    }
}
