<?php

namespace Tests\Unit\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Specifications\FloorSpecification;
use Tests\TestCase;

class FloorSpecificationTest extends TestCase
{
    /**
     * @var FloorSpecification
     */
    private $floorSpecification;

    protected function setUp(): void
    {
        $this->floorSpecification = new FloorSpecification();
    }

    /** @test */
    public function it_should_return_false_when_the_given_position_is_an_empty_seat(): void
    {
        // Act
        $dissatisfied = $this->floorSpecification->isSatisfiedBy(1, 2, 'L');

        // Assert
        $this->assertFalse($dissatisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_given_position_is_an_occupied_seat(): void
    {
        // Act
        $dissatisfied = $this->floorSpecification->isSatisfiedBy(1, 2, '#');

        // Assert
        $this->assertFalse($dissatisfied);
    }

    /** @test */
    public function it_should_return_true_when_the_given_position_is_a_piece_of_floor(): void
    {
        // Act
        $satisfied = $this->floorSpecification->isSatisfiedBy(1, 2, '.');

        // Assert
        $this->assertTrue($satisfied);
    }
}
