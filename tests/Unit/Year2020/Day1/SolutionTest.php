<?php

namespace Tests\Unit\Year2020\Day1;

use App\Year2020\Day1\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $collection = new Collection([1721, 979, 366, 299, 675, 1456]);
        $solution = new Solution($collection);

        // Act
        $first = $solution->first();
        $second = $solution->second();


        // Assert
        $this->assertEquals('514579', $first);
        $this->assertEquals('241861950', $second);
    }
}
