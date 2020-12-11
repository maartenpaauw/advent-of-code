<?php

namespace Tests\Unit\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Specifications\EmptySeatSpecification;
use Tests\TestCase;

class EmptySeatSpecificationTest extends TestCase
{
    /**
     * @var EmptySeatSpecification
     */
    private $emptySeatSpecification;

    protected function setUp(): void
    {
        $this->emptySeatSpecification = new EmptySeatSpecification();
    }

    /** @test */
    public function it_should_return_true_when_the_given_position_is_an_empty_seat(): void
    {
        // Act
        $satisfied = $this->emptySeatSpecification->isSatisfiedBy(1, 2, 'L');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_given_position_is_an_occupied_seat(): void
    {
        // Act
        $dissatisfied = $this->emptySeatSpecification->isSatisfiedBy(1, 2, '#');

        // Assert
        $this->assertFalse($dissatisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_given_position_is_a_piece_of_floor(): void
    {
        // Act
        $dissatisfied = $this->emptySeatSpecification->isSatisfiedBy(1, 2, '.');

        // Assert
        $this->assertFalse($dissatisfied);
    }
}
