<?php

namespace Tests\Unit\Puzzle\Input;

use App\Puzzle\Input\StringInput;
use Tests\TestCase;

class StringInputTest extends TestCase
{
    /** @test */
    public function it_should_return_a_string_as_content(): void
    {
        // Arrange
        $stringInput = new StringInput('1234567890');

        // Act
        $content = $stringInput->content();

        // Assert
        $this->assertEquals('1234567890', $content);
    }
}
