<?php

namespace Tests\Unit\Puzzle\Input;

use App\Puzzle\Input\CollectionInputAdapter;
use Illuminate\Support\Collection;
use Tests\TestCase;

class CollectionInputAdapterTest extends TestCase
{
    /** @test */
    public function it_should_return_a_collection_instance(): void
    {
        // Arrange
        $collection = new Collection([1, 2, 3, 4, 5]);
        $input = new CollectionInputAdapter($collection);

        // Act
        $content = $input->content();

        // Assert
        $this->assertEquals([1, 2, 3, 4, 5], $content);
    }
}
