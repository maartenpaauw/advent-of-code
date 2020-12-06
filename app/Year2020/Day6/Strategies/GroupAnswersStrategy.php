<?php

namespace App\Year2020\Day6\Strategies;

use Illuminate\Support\Collection;

interface GroupAnswersStrategy
{
    public function count(Collection $groups): int;
}
