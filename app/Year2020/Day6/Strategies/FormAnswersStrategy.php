<?php

namespace App\Year2020\Day6\Strategies;

use Illuminate\Support\Collection;

interface FormAnswersStrategy
{
    public function get(Collection $forms): Collection;
}
