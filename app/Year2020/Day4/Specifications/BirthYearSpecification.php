<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\PassportContract;

class BirthYearSpecification implements PassportSpecification
{
    /**
     * @var int
     */
    private $from;

    /**
     * @var int
     */
    private $to;

    public function __construct(int $from, int $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function isSatisfiedBy(PassportContract $passport): bool
    {
        try {
            return ($this->from <= $passport->birthYear()) && ($passport->birthYear() <= $this->to);
        } catch (FieldNotFoundException $exception) {
            return false;
        }
    }
}
