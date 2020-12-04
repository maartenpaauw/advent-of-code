<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\PassportContract;

interface PassportSpecification
{
    public function isSatisfiedBy(PassportContract $passport): bool;
}
