<?php

namespace Tests\Unit\Year2020\Day6\Strategies;

use App\Year2020\Day6\Strategies\GroupAnswersStrategy;
use App\Year2020\Day6\Strategies\MatchingGroupAnswers;

class MatchingGroupAnswersTest extends GroupAnswersTest
{
    public function strategy(): GroupAnswersStrategy
    {
        return new MatchingGroupAnswers();
    }

    public function expected(): int
    {
        return 6;
    }
}
