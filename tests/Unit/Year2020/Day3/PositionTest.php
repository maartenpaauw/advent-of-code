<?php

namespace Tests\Unit\Year2020\Day3;

use App\Year2020\Day3\Position;
use App\Year2020\Day3\Slope;
use Tests\TestCase;

class PositionTest extends TestCase
{
    /** @test */
    public function it_should_return_the_current_coordinates(): void
    {
        // Arrange
        $position = new Position(1, 2);

        // Act
        $x = $position->x();
        $y = $position->y();

        // Assert
        $this->assertEquals(1, $x);
        $this->assertEquals(2, $y);
    }

    /** @test */
    public function it_should_return_the_next_position_based_on_a_slope(): void
    {
        // Arrange
        $position = new Position(1, 4);
        $slope = new Slope(5, 3);

        // Act
        $nextPosition = $position->move($slope);

        // Assert
        $this->assertEquals(6, $nextPosition->x());
        $this->assertEquals(7, $nextPosition->y());
    }
}
