<?php

namespace App\Puzzle\Identification;

use Stringable;

abstract class IdentificationDecorator implements Stringable
{
    /**
     * @var Identification
     */
    protected $origin;

    public function __construct(Identification $origin)
    {
        $this->origin = $origin;
    }

    public function year(): int
    {
        return $this->origin->year();
    }

    public function day(): int
    {
        return $this->origin->day();
    }

    public function __toString(): string
    {
        return $this->origin->__toString();
    }
}
