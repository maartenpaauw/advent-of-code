<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\PassportContract;

class ExpirationYearSpecification implements PassportSpecification
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
            return ($this->from <= $passport->expirationYear()) && ($passport->expirationYear() <= $this->to);
        } catch (FieldNotFoundException $exception) {
            return false;
        }
    }
}
