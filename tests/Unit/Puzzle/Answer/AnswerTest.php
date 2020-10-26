<?php

namespace Tests\Unit\Puzzle\Answer;

use App\Puzzle\Answer\Answer;
use Tests\TestCase;

abstract class AnswerTest extends TestCase
{
    abstract protected function answer(): Answer;

    /** @test */
    public function it_should_return_the_answer_as_string(): void
    {
        // Arrange
        $expectedAnswer = 'Hello world!';

        // Act
        $answer = $this->answer();

        // Assert
        $this->assertEquals($expectedAnswer, $answer);
    }
}
