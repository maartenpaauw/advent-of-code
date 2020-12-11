<?php

namespace Tests\Unit\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Specifications\EmptySeatSpecification;
use App\Year2020\Day11\Positions\Specifications\OccupiedSeatSpecification;
use App\Year2020\Day11\Positions\Specifications\OrSpecification;
use Tests\TestCase;

class OrSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_return_true_when_the_only_given_specification_is_satisfied(): void
    {
        // Arrange
        $orSpecification = new OrSpecification(new EmptySeatSpecification());

        // Act
        $satisfied = $orSpecification->isSatisfiedBy(1, 2, 'L');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_only_given_specification_is_dissatisfied(): void
    {
        // Arrange
        $orSpecification = new OrSpecification(new EmptySeatSpecification());

        // Act
        $dissatisfied = $orSpecification->isSatisfiedBy(1, 2, '#');

        // Assert
        $this->assertFalse($dissatisfied);
    }

    /** @test */
    public function it_should_return_true_when_one_of_the_given_specifications_is_satisfied(): void
    {
        // Arrange
        $orSpecification = new OrSpecification(
            new EmptySeatSpecification(),
            new OccupiedSeatSpecification()
        );

        // Act
        $satisfied = $orSpecification->isSatisfiedBy(1, 2, '#');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_both_of_the_given_specifications_are_dissatisfied(): void
    {
        // Arrange
        $orSpecification = new OrSpecification(
            new EmptySeatSpecification(),
            new OccupiedSeatSpecification()
        );

        // Act
        $satisfied = $orSpecification->isSatisfiedBy(1, 2, '.');

        // Assert
        $this->assertFalse($satisfied);
    }
}
