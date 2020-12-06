<?php

namespace Tests\Unit\Year2020\Day6\Strategies;

use App\Year2020\Day6\Strategies\GroupAnswersStrategy;
use App\Year2020\Day6\Strategies\UniqueGroupAnswers;

class UniqueGroupAnswersTest extends GroupAnswersTest
{
    public function strategy(): GroupAnswersStrategy
    {
        return new UniqueGroupAnswers();
    }

    public function expected(): int
    {
        return 11;
    }
}
