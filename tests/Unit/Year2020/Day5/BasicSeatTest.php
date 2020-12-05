<?php

namespace Tests\Unit\Year2020\Day5;

use App\Year2020\Day5\BasicSeat;
use Tests\TestCase;

class BasicSeatTest extends TestCase
{
    /** @test */
    public function it_should_return_the_id_correctly(): void
    {
        // Arrange
        $basicSeat = new BasicSeat(1);

        // Assert
        $this->assertEquals(1, $basicSeat->id());
    }
}
