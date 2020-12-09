<?php

namespace App\Year2020\Day9;

class InvalidNumber
{
    /**
     * @var XMAS
     */
    private $xmas;

    public function __construct(XMAS $xmas)
    {
        $this->xmas = $xmas;
    }

    public function toInteger(): int
    {
        do {
            $preamble = $this->xmas->preamble();
            $current = $this->xmas->current();

            $this->xmas->next();
        } while ($this->xmas->valid() && (new PreambleSpecification($preamble))->isSatisfiedBy($current));

        $this->xmas->rewind();

        return $current;
    }
}
