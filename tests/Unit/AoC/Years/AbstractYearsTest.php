<?php

namespace Tests\Unit\AoC\Years;

use App\AoC\Years\Years;
use Tests\TestCase;

abstract class AbstractYearsTest extends TestCase
{
    protected abstract function years(): Years;

    /** @test */
    public function it_should_return_an_array_with_years_correctly(): void
    {
        // Act
        $yearsArray = $this->years()->toArray();

        // Assert
        $this->assertCount(1, $yearsArray);
        $this->assertEquals(2020, $yearsArray[0]);
    }
}
