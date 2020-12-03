<?php

namespace Tests\Unit\Year2020\Day3;

use App\Year2020\Day3\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $collection = new Collection([
            '..##.......',
            '#...#...#..',
            '.#....#..#.',
            '..#.#...#.#',
            '.#...##..#.',
            '..#.##.....',
            '.#.#.#....#',
            '.#........#',
            '#.##...#...',
            '#...##....#',
            '.#..#...#.#',
        ]);

        $solution = new Solution($collection);

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('7', $first);
        $this->assertEquals('336', $second);
    }
}
