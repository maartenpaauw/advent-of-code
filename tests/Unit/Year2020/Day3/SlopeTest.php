<?php

namespace Tests\Unit\Year2020\Day3;

use App\Year2020\Day3\Slope;
use Tests\TestCase;

class SlopeTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_movements(): void
    {
        // Arrange
        $slope = new Slope(3, 1);

        // Act
        $right = $slope->right();
        $down = $slope->down();

        // Assert
        $this->assertEquals($right, 3);
        $this->assertEquals($down, 1);
    }
}
