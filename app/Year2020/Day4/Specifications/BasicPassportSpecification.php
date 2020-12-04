<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\PassportContract;

class BasicPassportSpecification implements PassportSpecification
{
    public function isSatisfiedBy(PassportContract $passport): bool
    {
        try {
            $passport->birthYear();
            $passport->issueYear();
            $passport->expirationYear();
            $passport->height();
            $passport->hairColor();
            $passport->eyeColor();
            $passport->id();

            return true;
        } catch (FieldNotFoundException $exception) {
            return false;
        }
    }
}
