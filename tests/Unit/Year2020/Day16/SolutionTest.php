<?php

namespace Tests\Unit\Year2020\Day16;

use App\Puzzle\Input\StringInput;
use App\Year2020\Day16\Solution;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $solution = new Solution(
            new StringInput('class: 1-3 or 5-7
row: 6-11 or 33-44
seat: 13-40 or 45-50

your ticket:
7,1,14

nearby tickets:
7,3,47
40,4,50
55,2,20
38,6,12')
        );

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('71', $first);
    }
}
