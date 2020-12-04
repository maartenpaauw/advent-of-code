<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\PassportContract;

class PassportIdSpecification implements PassportSpecification
{
    public function isSatisfiedBy(PassportContract $passport): bool
    {
        try {
            return preg_match('/^[0-9]{9}$/', $passport->passportId());
        } catch (FieldNotFoundException $e) {
            return false;
        }
    }
}
