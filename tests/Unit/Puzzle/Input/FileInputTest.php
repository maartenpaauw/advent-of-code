<?php

namespace Tests\Unit\Puzzle\Input;

use App\Puzzle\Input\FileInput;
use App\Puzzle\Input\StringInput;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileInputTest extends TestCase
{
    /** @test */
    public function it_should_return_the_file_content_correctly(): void
    {
        // Arrange
        Storage::fake();
        Storage::put('input/2020/1.txt', '(())');

        $stringInput = new StringInput('input/2020/1.txt');
        $fileInput = new FileInput($stringInput);

        // Act
        $content = $fileInput->content();

        // Assert
        $this->assertEquals('(())', $content);
    }
}
