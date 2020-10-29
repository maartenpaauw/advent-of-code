<?php

namespace Tests\Unit\Puzzle\Identification;

use App\Puzzle\Identification\ClassIdentification;
use App\Puzzle\Identification\Identification;
use Tests\TestCase;

class ClassIdentificationTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_class_path(): void
    {
        // Arrange
        $identification = new Identification(2020, 26);

        // Act
        $classIdentification = new ClassIdentification($identification);

        // Assert
        $this->assertEquals('Year2020/Day26/Solution', $classIdentification);
    }
}
