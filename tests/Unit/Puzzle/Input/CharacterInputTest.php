<?php

namespace Tests\Unit\Puzzle\Input;

use App\Puzzle\Input\CharacterInput;
use App\Puzzle\Input\StringInput;
use Tests\TestCase;

class CharacterInputTest extends TestCase
{
    /** @test */
    public function it_should_return_an_array_as_content(): void
    {
        // Arrange
        $stringInput = new StringInput('1234567890');
        $characterInput = new CharacterInput($stringInput);

        // Act
        $content = $characterInput->content();

        // Assert
        $this->assertEquals([1, 2, 3, 4, 5, 6, 7, 8, 9, 0], $content);
    }
}
