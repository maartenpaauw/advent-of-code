<?php

namespace Tests\Unit\Puzzle\Input;

use App\Puzzle\Input\ListInput;
use App\Puzzle\Input\StringInput;
use Tests\TestCase;

class ListInputTest extends TestCase
{
    /** @test */
    public function it_should_return_an_array_as_content(): void
    {
        // Arrange
        $stringInput = new StringInput(sprintf('a%sb', PHP_EOL));
        $listInput = new ListInput($stringInput);

        // Act
        $content = $listInput->content();

        // Assert
        $this->assertCount(2, $content);
    }

    /** @test */
    public function it_should_split_a_given_string_by_each_comma(): void
    {
        // Arrange
        $stringInput = new StringInput('a,b,c,d');
        $listInput = new ListInput($stringInput, '/,/');

        // Act
        $content = $listInput->content();

        // Assert
        $this->assertCount(4, $content);
    }

    /** @test */
    public function it_should_filter_out_null_values(): void
    {
        // Arrange
        $stringInput = new StringInput(sprintf('a%sb%s', PHP_EOL, PHP_EOL));
        $listInput = new ListInput($stringInput);

        // Act
        $content = $listInput->content();

        // Assert
        $this->assertCount(2, $content);
    }
}
