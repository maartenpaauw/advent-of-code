<?php

namespace App\Puzzle\Identification;

class SolutionIdentification extends IdentificationDecorator
{
    public function __toString(): string
    {
        return sprintf('\\App\\Year%s\\Day%s\\Solution', $this->origin->year(), $this->origin->day());
    }
}
