<?php

namespace Tests\Unit\Puzzle\Solution;

use App\Puzzle\Input\StringInput;
use App\Puzzle\Solution\FakeSolution;
use Tests\TestCase;

class FakeSolutionTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_answers(): void
    {
        // Arrange
        $stringInput = new StringInput();
        $fakeSolution = new FakeSolution($stringInput);

        // Act
        $first = $fakeSolution->first();
        $second = $fakeSolution->second();

        // Assert
        $this->assertEquals('1', $first);
        $this->assertEquals('2', $second);
    }
}
