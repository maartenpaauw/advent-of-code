<?php

namespace Tests\Unit\Puzzle\Identification;

use App\Puzzle\Identification\InputIdentification;
use App\Puzzle\Identification\Identification;
use Tests\TestCase;

class FileIdentificationTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_file_path(): void
    {
        // Arrange
        $identification = new Identification(2020, 26);

        // Act
        $fileIdentification = new InputIdentification($identification);

        // Assert
        $this->assertEquals('input/2020/26.txt', $fileIdentification);
    }
}
