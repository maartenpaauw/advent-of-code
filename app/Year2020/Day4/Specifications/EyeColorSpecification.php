<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\PassportContract;

class EyeColorSpecification implements PassportSpecification
{
    public function isSatisfiedBy(PassportContract $passport): bool
    {
        try {
            $eyeColor = $passport->eyeColor();

            return in_array($eyeColor, [
                'amb',
                'blu',
                'brn',
                'gry',
                'grn',
                'hzl',
                'oth',
            ]);
        } catch (FieldNotFoundException $e) {
            return false;
        }
    }
}
