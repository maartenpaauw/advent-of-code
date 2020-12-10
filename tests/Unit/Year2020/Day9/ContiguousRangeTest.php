<?php

namespace Tests\Unit\Year2020\Day9;

use App\Year2020\Day9\ContiguousRange;
use Tests\TestCase;

class ContiguousRangeTest extends TestCase
{
    /**
     * @var ContiguousRange
     */
    private $contiguousRange;

    protected function setUp(): void
    {
        parent::setUp();

        $this->contiguousRange = new ContiguousRange([15, 25, 47, 40]);
    }

    /** @test */
    public function it_should_convert_the_set_to_an_array_correctly(): void
    {
        // Act
        $array = $this->contiguousRange->toArray();

        // Assert
        $this->assertEquals([15, 25, 47, 40], $array);
    }

    /** @test */
    public function it_should_return_the_sum_of_the_set_correctly(): void
    {
        // Act
        $sum = $this->contiguousRange->sum();

        // Assert
        $this->assertEquals(127, $sum);
    }
}
