<?php

namespace Tests\Unit\Year2020\Day9;

use App\Year2020\Day9\ContiguousSet;
use Tests\TestCase;

class ContiguousSetTest extends TestCase
{
    /**
     * @var ContiguousSet
     */
    private $contiguousSet;

    protected function setUp(): void
    {
        parent::setUp();

        $this->contiguousSet = new ContiguousSet([15, 25, 47, 40]);
    }

    /** @test */
    public function it_should_convert_the_set_to_an_array_correctly(): void
    {
        // Act
        $array = $this->contiguousSet->toArray();

        // Assert
        $this->assertEquals([15, 25, 47, 40], $array);
    }

    /** @test */
    public function it_should_return_the_sum_of_the_set_correctly(): void
    {
        // Act
        $sum = $this->contiguousSet->sum();

        // Assert
        $this->assertEquals(127, $sum);
    }
}
