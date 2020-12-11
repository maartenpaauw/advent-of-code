<?php

namespace Tests\Unit\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\EmptySeat;
use App\Year2020\Day11\Positions\Floor;
use App\Year2020\Day11\Positions\OccupiedSeat;
use App\Year2020\Day11\Positions\Specifications\OccupiedSeatSpecification;
use Tests\TestCase;

class OccupiedSeatSpecificationTest extends TestCase
{
    /**
     * @var OccupiedSeatSpecification
     */
    private $occupiedSeatSpecification;

    protected function setUp(): void
    {
        $this->occupiedSeatSpecification = new OccupiedSeatSpecification();
    }

    /** @test */
    public function it_should_return_false_when_the_given_position_is_an_empty_seat(): void
    {
        // Act
        $dissatisfied = $this->occupiedSeatSpecification->isSatisfiedBy(1, 2, 'l');

        // Assert
        $this->assertFalse($dissatisfied);
    }

    /** @test */
    public function it_should_return_true_when_the_given_position_is_an_occupied_seat(): void
    {
        // Act
        $satisfied = $this->occupiedSeatSpecification->isSatisfiedBy(1, 2, '#');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_given_position_is_a_piece_of_floor(): void
    {
        // Act
        $dissatisfied = $this->occupiedSeatSpecification->isSatisfiedBy(1, 2, '.');

        // Assert
        $this->assertFalse($dissatisfied);
    }
}
