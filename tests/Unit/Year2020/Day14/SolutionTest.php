<?php

namespace Tests\Unit\Year2020\Day14;

use App\Puzzle\Input\CollectionInputAdapter;
use App\Year2020\Day14\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $solution = new Solution(new CollectionInputAdapter(new Collection([
            'mask = XXXXXXXXXXXXXXXXXXXXXXXXXXXXX1XXXX0X',
            'mem[8] = 11',
            'mem[7] = 101',
            'mem[8] = 0',
        ])));

        // Act
        $first = $solution->first();

        // Assert
        $this->assertEquals('165', $first);
    }
}
