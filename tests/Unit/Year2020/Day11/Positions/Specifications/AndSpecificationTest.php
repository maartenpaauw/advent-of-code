<?php

namespace Tests\Unit\Year2020\Day11\Positions\Specifications;

use App\Year2020\Day11\Positions\Specifications\AndSpecification;
use App\Year2020\Day11\Positions\Specifications\EmptySeatSpecification;
use Tests\TestCase;

class AndSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_return_true_when_the_only_given_specification_is_satisfied(): void
    {
        // Arrange
        $andSpecification = new AndSpecification(new EmptySeatSpecification());

        // Act
        $satisfied = $andSpecification->isSatisfiedBy(1, 2, 'L');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_only_given_specification_is_dissatisfied(): void
    {
        // Arrange
        $andSpecification = new AndSpecification(new EmptySeatSpecification());

        // Act
        $dissatisfied = $andSpecification->isSatisfiedBy(1, 2, '#');

        // Assert
        $this->assertFalse($dissatisfied);
    }
}
