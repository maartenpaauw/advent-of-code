<?php

namespace Tests\Unit\Puzzle\Answer;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;

class IntegerAnswerTest extends AnswerTest
{
    protected function answer(): Answer
    {
        return new IntegerAnswer(1);
    }
}
