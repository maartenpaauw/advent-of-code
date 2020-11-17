<?php

namespace Tests\Unit\Puzzle\Identification;

use App\Puzzle\Identification\Identification;
use App\Puzzle\Identification\RemoteIdentification;
use Tests\TestCase;

class RemoteIdentificationTest extends TestCase
{
    /** @test */
    public function it_should_return_the_correct_remote_path(): void
    {
        // Arrange
        $identification = new Identification(2020, 16);

        // Act
        $remoteIdentification = new RemoteIdentification($identification);

        // Assert
        $this->assertEquals('/2020/day/16/input', $remoteIdentification);
    }
}
