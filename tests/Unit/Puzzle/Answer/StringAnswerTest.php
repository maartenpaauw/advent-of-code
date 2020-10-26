<?php

namespace Tests\Unit\Puzzle\Answer;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\StringAnswer;

class StringAnswerTest extends AnswerTest {
    protected function answer(): Answer
    {
        return new StringAnswer('Hello world!');
    }
}
