<?php

namespace Tests\Unit\Year2020\Day6\Strategies;

use App\Year2020\Day6\Strategies\FormAnswersStrategy;
use App\Year2020\Day6\Strategies\MatchingFormAnswers;

class MatchingFormAnswersTest extends FormAnswersTest
{
    public function strategy(): FormAnswersStrategy
    {
        return new MatchingFormAnswers();
    }

    public function expected(): array
    {
        return ['a'];
    }
}
