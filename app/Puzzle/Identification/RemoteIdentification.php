<?php

namespace App\Puzzle\Identification;

class RemoteIdentification extends IdentificationDecorator
{
    public function __toString(): string
    {
        return sprintf('/%s/day/%s/input', $this->origin->year(), $this->origin->day());
    }
}
