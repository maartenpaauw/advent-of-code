<?php

namespace App\Year2020\Day16\Specifications;

use App\Year2020\Day16\Range;

class BetweenRangeSpecification implements NumberSpecification
{

    /**
     * @var Range
     */
    private $range;

    public function __construct(Range $range)
    {
        $this->range = $range;
    }

    public function isSatisfiedBy(int $number): bool
    {
        return  ($this->range->from() <= $number) && ($number <= $this->range->to());
    }
}
