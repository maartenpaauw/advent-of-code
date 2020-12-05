<?php

namespace Tests\Unit\Year2020\Day5;

use App\Year2020\Day5\Row;
use Tests\TestCase;

class RowTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $first = new Row('BFFFBBF');
        $second = new Row('FFFBBBF');
        $third = new Row('BBFFBBF');

        // Assert
        $this->assertEquals(70, $first->number());
        $this->assertEquals(14, $second->number());
        $this->assertEquals(102, $third->number());
    }
}
