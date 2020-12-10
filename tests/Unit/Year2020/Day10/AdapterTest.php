<?php

namespace Tests\Unit\Year2020\Day10;

use App\Year2020\Day10\Adapter;
use Tests\TestCase;

class AdapterTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_rating(): void
    {
        // Arrange
        $adapter = new Adapter(10);

        // Act
        $rating = $adapter->rating();

        // Assert
        $this->assertEquals(10, $rating);
    }

    /** @test */
    public function it_should_return_the_difference_between_two_adapters(): void
    {
        // Arrange
        $first = new Adapter(10);
        $second = new Adapter(12);

        // Assert
        $this->assertEquals(2, $first->difference($second));
        $this->assertEquals(2, $second->difference($first));
    }
}
