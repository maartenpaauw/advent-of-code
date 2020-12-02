<?php

namespace Tests\Unit\Puzzle\Identification;

use App\Puzzle\Identification\Identification;
use App\Puzzle\Identification\SolutionIdentification;
use Tests\TestCase;

class SolutionIdentificationTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_identification_class_name(): void
    {
        // Arrange
        $identification = new Identification(2020, 1);
        $solutionIdentification = new SolutionIdentification($identification);

        // Assert
        $this->assertEquals('\\App\\Year2020\\Day1\\Solution', $solutionIdentification);
    }
}
