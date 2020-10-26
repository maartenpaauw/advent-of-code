<?php

namespace Tests\Unit\Puzzle;

use App\Puzzle\Identification;
use PHPUnit\Framework\TestCase;

class IdentificationTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_identification_string(): void
    {
        // Act
        $identification = new Identification(2020, 26);

        // Assert
        $this->assertEquals('2020.26', $identification);
    }
}
