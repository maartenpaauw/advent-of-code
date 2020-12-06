<?php

namespace App\Year2020\Day6\Strategies;

use App\Year2020\Day6\Contracts\GroupContract;
use Illuminate\Support\Collection;

class UniqueGroupAnswers implements GroupAnswersStrategy
{
    public function count(Collection $groups): int
    {
        return $groups->reduce(function (int $count, GroupContract $group) {
            return $count + $group->unique()->count();
        }, 0);
    }
}
