<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\PassportContract;

class HairColorSpecification implements PassportSpecification
{
    public function isSatisfiedBy(PassportContract $passport): bool
    {
        try {
            return preg_match('/^#([a-f0-9]{6})$/', $passport->hairColor());
        } catch (FieldNotFoundException $e) {
            return false;
        }
    }
}
