<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\PassportContract;

class EyeColorSpecification implements PassportSpecification
{
    /**
     * @var array
     */
    private $colors;

    public function __construct(array $colors)
    {
        $this->colors = $colors;
    }

    public function isSatisfiedBy(PassportContract $passport): bool
    {
        try {
            return in_array($passport->eyeColor(), $this->colors);
        } catch (FieldNotFoundException $e) {
            return false;
        }
    }
}
