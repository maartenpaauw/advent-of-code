<?php

namespace Tests\Unit\Puzzle;

use App\Puzzle\Puzzle;
use App\Puzzle\Solution\FakeSolution;
use Tests\TestCase;

class PuzzleTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_answers(): void
    {
        // Arrange
        $fakeSolution = new FakeSolution();
        $puzzle = new Puzzle($fakeSolution);

        // Act
        $first = $puzzle->partOne();
        $second = $puzzle->partTwo();

        // Assert
        $this->assertEquals('1', $first);
        $this->assertEquals('2', $second);
    }
}
