<?php

namespace Tests\Unit\Year2020\Day7;

use App\Year2020\Day7\EmptyBag;
use PHPUnit\Framework\TestCase;

class EmptyBagTest extends TestCase
{
    /**
     * @var EmptyBag
     */
    private $blue;

    protected function setUp(): void
    {
        parent::setUp();

        $this->blue = new EmptyBag('faded blue', 10);
    }

    /** @test */
    public function it_should_return_the_color_name_correctly(): void
    {
        // Assert
        $this->assertEquals('faded blue', $this->blue->color());
    }

    /** @test */
    public function it_should_return_the_size_correctly(): void
    {
        // Assert
        $this->assertEquals(10, $this->blue->size());
    }

    /** @test */
    public function it_should_return_false_for_any_given_bag(): void
    {
        // Arrange
        $yellow = new EmptyBag('muted yellow', 1);

        // Act
        $canContain = $this->blue->canContain($yellow);

        // Assert
        $this->assertFalse($canContain);
    }
}
