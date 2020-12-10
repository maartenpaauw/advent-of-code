<?php

namespace Tests\Unit\Year2020\Day10;

use App\Year2020\Day10\Adapter;
use App\Year2020\Day10\Outlet;
use Tests\TestCase;

class OutletTest extends TestCase
{
    /** @test */
    public function it_should_return_the_rating_correctly(): void
    {
        // Arrange
        $outlet = new Outlet();

        // Act
        $rating = $outlet->rating();

        // Assert
        $this->assertEquals(0, $rating);
    }

    /** @test */
    public function it_should_return_the_difference_from_a_given_output_correctly(): void
    {
        // Arrange
        $outlet = new Outlet();
        $adapter = new Adapter(2);

        // Act
        $difference = $outlet->difference($adapter);

        // Assert
        $this->assertEquals(2, $difference);
    }
}
