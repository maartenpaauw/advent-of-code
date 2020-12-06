<?php

namespace Tests\Unit\Year2020\Day6;

use App\Year2020\Day6\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $collection = new Collection([
            'abc',
            'a'.PHP_EOL.'b'.PHP_EOL.'c',
            'ab'.PHP_EOL.'ac',
            'a'.PHP_EOL.'a'.PHP_EOL.'a'.PHP_EOL.'a',
            'b',
        ]);

        $solution = new Solution($collection);

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('11', $first);
        $this->assertEquals('6', $second);
    }
}
