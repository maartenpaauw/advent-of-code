<?php

namespace App\Year2020\Day5\Specifications;

use App\Year2020\Day5\Contracts\SeatContract;
use App\Year2020\Day5\Contracts\SeatSpecification;
use Illuminate\Support\Collection;

class SeatHasNeighborsSpecification implements SeatSpecification
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
        $ids = $this->seats->map(function (SeatContract $seat) {
            return $seat->id();
        })->values();

        return $ids->contains($seat->id() - 1) && $ids->contains($seat->id() + 1);
    }
}
