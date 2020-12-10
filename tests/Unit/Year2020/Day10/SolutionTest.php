<?php

namespace Tests\Unit\Year2020\Day10;

use App\Puzzle\Input\CollectionInputAdapter;
use App\Year2020\Day10\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_first_example_input_correctly(): void
    {
        // Arrange
        $solution = new Solution(
            new CollectionInputAdapter(
                new Collection([
                    16,
                    10,
                    15,
                    5,
                    1,
                    11,
                    7,
                    19,
                    6,
                    12,
                    4,
                ])
            )
        );

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('35', $first);
    }

    /** @test */
    public function it_handles_the_second_example_input_correctly(): void
    {
        // Arrange
        $solution = new Solution(
            new CollectionInputAdapter(
                new Collection([
                    28,
                    33,
                    18,
                    42,
                    31,
                    14,
                    46,
                    20,
                    48,
                    47,
                    24,
                    23,
                    49,
                    45,
                    19,
                    38,
                    39,
                    11,
                    1,
                    32,
                    25,
                    35,
                    8,
                    17,
                    7,
                    9,
                    4,
                    2,
                    34,
                    10,
                    3,
                ])
            )
        );

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('220', $first);
    }
}
