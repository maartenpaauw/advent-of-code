<?php

namespace App\Year2020\Day4\Specifications;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\PassportContract;

class HeightSpecification implements PassportSpecification
{
    /**
     * @var int
     */
    private $min;

    /**
     * @var int
     */
    private $max;

    /**
     * @var string
     */
    private $unit;

    public function __construct(int $min, int $max, string $unit)
    {
        $this->min = $min;
        $this->max = $max;
        $this->unit = $unit;
    }

    public function isSatisfiedBy(PassportContract $passport): bool
    {
        try {
            $height = $passport->height();

            if (!str_ends_with($height, $this->unit)) {
                return false;
            }

            $height = str_replace($this->unit, '', $height);

            return ($this->min <= $height) && ($height <= $this->max);
        } catch (FieldNotFoundException $e) {
            return false;
        }
    }
}
