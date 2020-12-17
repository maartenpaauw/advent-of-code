<?php

namespace Tests\Unit\Year2020\Day16\Specifications;

use App\Year2020\Day16\Range;
use App\Year2020\Day16\Specifications\BetweenRangeSpecification;
use Tests\TestCase;

class BetweenRangeSpecificationTest extends TestCase
{
    /**
     * @var BetweenRangeSpecification
     */
    private $betweenRangeSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        // Arrange
        $this->betweenRangeSpecification = new BetweenRangeSpecification(new Range('10-20'));
    }

    /** @test */
    public function it_should_return_true_when_the_given_number_is_within_the_given_range(): void
    {
        // Act
        $valid = $this->betweenRangeSpecification->isSatisfiedBy(15);

        // Assert
        $this->assertTrue($valid);
    }

    /** @test */
    public function it_should_return_true_when_the_given_number_is_the_maximum_allowed_number(): void
    {
        // Act
        $valid = $this->betweenRangeSpecification->isSatisfiedBy(20);

        // Assert
        $this->assertTrue($valid);
    }

    /** @test */
    public function it_should_return_true_when_the_given_number_is_the_minimum_allowed_number(): void
    {
        // Act
        $valid = $this->betweenRangeSpecification->isSatisfiedBy(10);

        // Assert
        $this->assertTrue($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_given_number_is_below_minimum_allowed_number(): void
    {
        // Act
        $valid = $this->betweenRangeSpecification->isSatisfiedBy(9);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_given_number_is_above_maximum_allowed_number(): void
    {
        // Act
        $valid = $this->betweenRangeSpecification->isSatisfiedBy(21);

        // Assert
        $this->assertFalse($valid);
    }
}
