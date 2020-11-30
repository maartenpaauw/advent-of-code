<?php

namespace Tests\Unit\AoC\Days;

use App\AoC\Days\Days;
use Tests\TestCase;

abstract class AbstractDaysTest extends TestCase
{
    protected abstract function days(): Days;

    /** @test */
    public function it_should_return_the_first_day_correctly(): void
    {
        $this->assertEquals(1, $this->days()->first());
    }

    /** @test */
    public function it_should_return_the_last_day_correctly(): void
    {
        $this->assertEquals(25, $this->days()->last());
    }

    /** @test */
    public function it_should_return_an_array_with_all_days_correctly(): void
    {
        // Act
        $daysArray = $this->days()->toArray();

        // Assert
        $this->assertCount(25, $daysArray);
        $this->assertEquals(10, $daysArray[9]);
    }
}
