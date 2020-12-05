<?php

namespace App\Year2020\Day5\Specifications;

use App\Year2020\Day5\Contracts\SeatContract;
use App\Year2020\Day5\Contracts\SeatSpecification;
use Illuminate\Support\Collection;

class SeatNotTakenSpecification implements SeatSpecification
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
        return !$this->seats->contains(function (SeatContract $available) use ($seat) {
            return $available->id() === $seat->id();
        });
    }
}
