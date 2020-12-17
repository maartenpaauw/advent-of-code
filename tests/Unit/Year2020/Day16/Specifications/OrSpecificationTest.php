<?php

namespace Tests\Unit\Year2020\Day16\Specifications;

use App\Year2020\Day16\Range;
use App\Year2020\Day16\Specifications\OrSpecification;
use App\Year2020\Day16\Specifications\BetweenRangeSpecification;
use Tests\TestCase;

class OrSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_return_true_if_one_of_the_given_specifications_is_valid(): void
    {
        // Arrange
        $specification = new OrSpecification(
            new BetweenRangeSpecification(new Range('10-20')),
            new BetweenRangeSpecification(new Range('30-40'))
        );

        // Act
        $valid = $specification->isSatisfiedBy(15);

        // Assert
        $this->assertTrue($valid);
    }

    /** @test */
    public function it_should_return_true_if_all_of_the_given_specifications_are_valid(): void
    {
        // Arrange
        $specification = new OrSpecification(
            new BetweenRangeSpecification(new Range('10-20')),
            new BetweenRangeSpecification(new Range('10-20'))
        );

        // Act
        $valid = $specification->isSatisfiedBy(15);

        // Assert
        $this->assertTrue($valid);
    }

    /** @test */
    public function it_should_return_false_if_the_given_specification_is_invalid(): void
    {
        // Arrange
        $specification = new OrSpecification(
            new BetweenRangeSpecification(new Range('10-20'))
        );

        // Act
        $valid = $specification->isSatisfiedBy(8);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_if_the_given_specifications_are_invalid(): void
    {
        // Arrange
        $specification = new OrSpecification(
            new BetweenRangeSpecification(new Range('10-20')),
            new BetweenRangeSpecification(new Range('30-40'))
        );

        // Act
        $valid = $specification->isSatisfiedBy(50);

        // Assert
        $this->assertFalse($valid);
    }
}
