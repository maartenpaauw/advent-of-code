<?php

namespace App\Year2020\Day16;

use App\Year2020\Day16\Specifications\NumberSpecification;
use App\Year2020\Day16\Specifications\OrSpecification;
use App\Year2020\Day16\Specifications\BetweenRangeSpecification;

class Field implements NumberSpecification
{
    /**
     * @var string
     */
    private $label;

    /**
     * @var Range[]
     */
    private $ranges;

    public function __construct(string $label, array $ranges)
    {
        $this->label = $label;
        $this->ranges = $ranges;
    }

    public function isSatisfiedBy(int $number): bool
    {
        return (new OrSpecification(
            ...array_map(function (Range $range) {
                return new BetweenRangeSpecification($range);
            }, $this->ranges)
        ))->isSatisfiedBy($number);
    }

    public function label(): string
    {
        return $this->label;
    }
}
