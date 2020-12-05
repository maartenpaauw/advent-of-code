<?php

namespace Tests\Unit\Year2020\Day5;

use App\Year2020\Day5\Column;
use App\Year2020\Day5\Row;
use App\Year2020\Day5\Seat;
use Tests\TestCase;

class SeatTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_input_correctly(): void
    {
        // Arrange
        $first = new Seat(new Row('BFFFBBF'), new Column('RRR'));
        $second = new Seat(new Row('FFFBBBF'), new Column('RRR'));
        $third = new Seat(new Row('BBFFBBF'), new Column('RLL'));

        // Assert
        $this->assertEquals(567, $first->id());
        $this->assertEquals(119, $second->id());
        $this->assertEquals(820, $third->id());
    }
}
