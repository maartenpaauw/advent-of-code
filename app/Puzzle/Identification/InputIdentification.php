<?php

namespace App\Puzzle\Identification;

class InputIdentification extends IdentificationDecorator
{
    public function __toString(): string
    {
        return sprintf('input/%s/%s.txt', $this->origin->year(), $this->origin->day());
    }
}
