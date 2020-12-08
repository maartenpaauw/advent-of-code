<?php

namespace Tests\Unit\Year2020\Day8;

use App\Year2020\Day8\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $instructions = new Collection([
            'nop +0',
            'acc +1',
            'jmp +4',
            'acc +3',
            'jmp -3',
            'acc -99',
            'acc +1',
            'jmp -4',
            'acc +6',
        ]);

        $solution = new Solution($instructions);

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('5', $first);
        $this->assertEquals('8', $second);
    }
}
