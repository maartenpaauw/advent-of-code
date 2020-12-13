<?php

namespace App\Year2020\Day13;

class BusDepartsAtTimestampSpecification implements TimestampSpecification
{
    /**
     * @var Bus
     */
    private $shuttle;

    public function __construct(Bus $shuttle)
    {
        $this->shuttle = $shuttle;
    }

    public function isSatisfiedBy(TimestampContract $timestamp): bool
    {
        return $this->shuttle->departs($timestamp);
    }
}
