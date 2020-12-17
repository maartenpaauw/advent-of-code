<?php

namespace App\Year2020\Day16\Specifications;

class OrSpecification implements NumberSpecification
{
    /**
     * @var NumberSpecification[]
     */
    private $specifications;

    public function __construct(NumberSpecification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(int $number): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($number)) {
                return true;
            }
        }

        return false;
    }
}
