<?php

namespace Tests\Unit\Year2020\Day6\Strategies;

use App\Year2020\Day6\Strategies\FormAnswersStrategy;
use App\Year2020\Day6\Strategies\UniqueFormAnswers;

class UniqueFormAnswersTest extends FormAnswersTest
{
    public function strategy(): FormAnswersStrategy
    {
        return new UniqueFormAnswers();
    }

    public function expected(): array
    {
        return ['a', 'b', 'c'];
    }
}
