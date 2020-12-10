<?php

namespace Tests\Unit\Year2020\Day10;

use App\Year2020\Day10\Adapter;
use App\Year2020\Day10\Device;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    /** @test */
    public function it_should_return_the_rating_correctly(): void
    {
        // Arrange
        $adapter = new Adapter(10);
        $device = new Device($adapter);

        // Act
        $rating = $device->rating();

        // Assert
        $this->assertEquals(13, $rating);
    }

    /** @test */
    public function it_should_return_the_difference_with_a_given_output_correctly(): void
    {
        // Arrange
        $first = new Adapter(12);
        $second = new Adapter(13);
        $device = new Device($first);

        // Act
        $difference = $device->difference($second);

        // Assert
        $this->assertEquals(2, $difference);
    }
}
