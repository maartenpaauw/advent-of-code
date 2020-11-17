<?php

namespace Tests\Unit\AoC;

use App\AoC\InputUri;
use App\Puzzle\Identification\Identification;
use App\Puzzle\Identification\RemoteIdentification;
use Tests\TestCase;

class InputUriTest extends TestCase
{
    /** @test */
    public function it_should_have_the_correct_path(): void
    {
        // Arrange
        $inputUri = new InputUri(new RemoteIdentification(new Identification(2020, 10)));
        $expectedPath = '/2020/day/10/input';

        // Act
        $path = $inputUri->getPath();

        // Assert
        $this->assertEquals($expectedPath, $path);
    }
}
