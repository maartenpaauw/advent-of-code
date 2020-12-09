<?php

namespace App\Year2020\Day9;

class PreambleSpecification implements NumberSpecification
{
    /**
     * @var int[]
     */
    private $preamble;

    public function __construct(array $preamble)
    {
        $this->preamble = $preamble;
    }

    public function isSatisfiedBy(int $number): bool
    {
        foreach ($this->preamble as $part) {
            if (in_array($number - $part, $this->preamble)) {
                return true;
            }
        }

        return false;
    }
}
