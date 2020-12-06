<?php

namespace App\Year2020\Day6\Strategies;

use App\Year2020\Day6\Contracts\FormContract;
use Illuminate\Support\Collection;

class UniqueFormAnswers implements FormAnswersStrategy
{
    public function get(Collection $forms): Collection
    {
        return $forms->reduce(function (Collection $answers, FormContract $form) {
            return $answers->merge($form->toArray());
        }, new Collection())->unique()->values();
    }
}
