<?php

namespace Tests\Unit\Puzzle\Input;

use App\Puzzle\Input\FileInput;
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

        $fileInput = new FileInput('input/2020/1.txt');

        // Act
        $content = $fileInput->content();

        // Assert
        $this->assertEquals('(())', $content);
    }
}
