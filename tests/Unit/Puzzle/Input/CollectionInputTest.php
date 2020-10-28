<?php

namespace Tests\Unit\Puzzle\Input;

use App\Puzzle\Input\CollectionInput;
use App\Puzzle\Input\StringInput;
use Tests\TestCase;

class CollectionInputTest extends TestCase
{
    /** @test */
    public function it_should_return_a_collection_instance_as_content(): void
    {
        // Arrange
        $stringInput = new StringInput('a');
        $collectionInput = new CollectionInput($stringInput);

        // Act
        $collectionInput->content();

        // Assert
        $this->assertCount(1, $collectionInput->content()->toArray());
        $this->assertEquals('a', $collectionInput->content()->first());
    }
}
