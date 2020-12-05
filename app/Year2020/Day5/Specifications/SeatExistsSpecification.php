<?php

namespace App\Year2020\Day5\Specifications;

use App\Year2020\Day5\Contracts\SeatContract;
use App\Year2020\Day5\Contracts\SeatSpecification;
use Illuminate\Support\Collection;

class SeatExistsSpecification implements SeatSpecification
{
    /**
     * @var Collection
     */
    private $seats;

    public function __construct(Collection $seats)
    {
        $this->seats = $seats;
    }

    public function isSatisfiedBy(SeatContract $seat): bool
    {
        /** @var SeatContract $first */
        $first = $this->seats->min;

        /** @var SeatContract $last */
        $last = $this->seats->max;

        return ($first->id() <= $seat->id()) && ($seat->id() <= $last->id());
    }
}
