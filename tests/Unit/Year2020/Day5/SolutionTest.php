<?php

namespace Tests\Unit\Year2020\Day5;

use App\Year2020\Day5\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $boardingPasses = new Collection([
            'BFFFBBFRRR',
            'FFFBBBFRRR',
            'BBFFBBFRLL',
        ]);

        $solution = new Solution($boardingPasses);

        // Act
        $first = $solution->first();

        // Assert
        $this->assertEquals('820', $first);
    }
}
