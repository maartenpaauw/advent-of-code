<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $collection = new Collection(['1-3 a: abcde', '1-3 b: cdefg', '2-9 c: ccccccccc']);
        $solution = new Solution($collection);

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('2', $first);
        $this->assertEquals('1', $second);
    }
}
