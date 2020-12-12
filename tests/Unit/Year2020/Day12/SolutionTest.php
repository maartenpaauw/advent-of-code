<?php

namespace Tests\Unit\Year2020\Day12;

use App\Puzzle\Input\CollectionInputAdapter;
use App\Year2020\Day12\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $solution = new Solution(new CollectionInputAdapter(
            new Collection([
                'F10',
                'N3',
                'F7',
                'R90',
                'F11',
            ])
        ));

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('25', $first);
        $this->assertEquals('286', $second);
    }
}
