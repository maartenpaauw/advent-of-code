<?php

namespace Tests\Unit\Year2020\Day9;

use App\Year2020\Day9\PreambleSpecification;
use Tests\TestCase;

class PreambleSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_return_true_when_the_given_number_is_valid(): void
    {
        // Arrange
        $preambleSpecification = new PreambleSpecification([
            35,
            20,
            15,
            25,
            47,
        ]);

        // Act
        $valid = $preambleSpecification->isSatisfiedBy(40);

        // Assert
        $this->assertTrue($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_given_number_is_invalid(): void
    {
        // Arrange
        $preambleSpecification = new PreambleSpecification([
            95,
            102,
            117,
            150,
            182,
        ]);

        // Act
        $valid = $preambleSpecification->isSatisfiedBy(127);

        // Assert
        $this->assertFalse($valid);
    }
}
