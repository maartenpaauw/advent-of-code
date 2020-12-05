<?php

namespace Tests\Unit\Year2020\Day5;

use App\Year2020\Day5\Column;
use Tests\TestCase;

class ColumnTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $first = new Column('RRR');
        $second = new Column('RLL');

        // Assert
        $this->assertEquals(7, $first->number());
        $this->assertEquals(4, $second->number());
    }
}
