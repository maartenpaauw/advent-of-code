<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\PassportContract;

class OrSpecification implements PassportSpecification
{
    /**
     * @var PassportSpecification[]
     */
    private $specifications;

    public function __construct(PassportSpecification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(PassportContract $passport): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($passport)) {
                return true;
            }
        }

        return false;
    }
}
