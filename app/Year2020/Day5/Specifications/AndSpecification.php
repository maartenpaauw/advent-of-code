<?php

namespace App\Year2020\Day5\Specifications;

use App\Year2020\Day5\Contracts\SeatContract;
use App\Year2020\Day5\Contracts\SeatSpecification;

class AndSpecification implements SeatSpecification
{
    /**
     * @var SeatSpecification[]
     */
    private $specifications;

    public function __construct(SeatSpecification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(SeatContract $seat): bool
    {
        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($seat)) {
                return false;
            }
        }

        return true;
    }
}
