<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\PassportContract;

class CountryIdSpecification implements PassportSpecification
{
    public function isSatisfiedBy(PassportContract $passport): bool
    {
        return true;
    }
}
