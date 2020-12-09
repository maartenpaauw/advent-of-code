<?php

namespace Tests\Unit\Year2020\Day9;

use App\Year2020\Day9\XMAS;
use Tests\TestCase;

class XMASTest extends TestCase
{
    /**
     * @var XMAS
     */
    private $XMAS;

    protected function setUp(): void
    {
        parent::setUp();

        $this->XMAS = new XMAS([
            35,
            20,
            15,
            25,
            47,
            40,
            62,
            55,
            65,
            95,
            102,
            117,
            150,
            182,
            127,
            219,
            299,
            277,
            309,
            576,
        ], 5);
    }

    /** @test */
    public function it_should_return_the_current_number_correctly(): void
    {
        // Act
        $current = $this->XMAS->current();

        // Assert
        $this->assertEquals(40, $current);
    }

    /** @test */
    public function it_should_return_the_next_number_correctly_after_increasing(): void
    {
        // Arrange
        $current = $this->XMAS->current();

        // Act
        $this->XMAS->next();
        $next = $this->XMAS->current();

        // Assert
        $this->assertEquals(40, $current);
        $this->assertEquals(62, $next);
    }

    /** @test */
    public function it_should_return_the_current_key_correctly(): void
    {
        // Act
        $key = $this->XMAS->key();

        // Assert
        $this->assertEquals(5, $key);
    }

    /** @test */
    public function it_should_return_a_boolean_as_valid_indicator(): void
    {
        // Arrange
        $XMAS = new XMAS([], 1);

        // Act
        $valid = $this->XMAS->valid();
        $invalid = $XMAS->valid();

        // Assert
        $this->assertTrue($valid);
        $this->assertFalse($invalid);
    }

    /** @test */
    public function it_should_rewind_the_data_stream_correctly(): void
    {
        // Arrange
        $current = $this->XMAS->current();
        $this->XMAS->next();

        // Act
        $this->XMAS->rewind();
        $rewind = $this->XMAS->current();

        // Assert
        $this->assertEquals($current, $rewind);
    }

    /** @test */
    public function it_should_return_the_preamble_correctly(): void
    {
        // Act
        $first = $this->XMAS->preamble();
        $this->XMAS->next();
        $second = $this->XMAS->preamble();

        // Assert
        $this->assertEquals([35, 20, 15, 25, 47], $first);
        $this->assertEquals([20, 15, 25, 47, 40], $second);
    }
}
