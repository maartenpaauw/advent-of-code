<?php

namespace Tests\Unit\Year2020\Day9;

use App\Puzzle\Input\CollectionInputAdapter;
use App\Year2020\Day9\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $solution = new Solution(
            new CollectionInputAdapter(
                new Collection([
                    35,
                    20,
                    15,
                    25,
                    47,
                    40,
                    62,
                    55,
                    65,
                    95,
                    102,
                    117,
                    150,
                    182,
                    127,
                    219,
                    299,
                    277,
                    309,
                    576,
                ])
            ),
            5
        );

        // Act
        $first = $solution->first();

        // Assert
        $this->assertEquals('127', $first);
    }
}
