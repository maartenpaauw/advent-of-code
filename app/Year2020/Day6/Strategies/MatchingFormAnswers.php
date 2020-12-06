<?php

namespace App\Year2020\Day6\Strategies;

use App\Year2020\Day6\Contracts\FormContract;
use Illuminate\Support\Collection;

class MatchingFormAnswers implements FormAnswersStrategy
{
    public function get(Collection $forms): Collection
    {
        return $forms->reduce(function (Collection $answers, FormContract $form) {
            return $answers->intersect($form->toArray());
        }, new Collection(range('a', 'z')));
    }
}
