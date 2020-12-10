<?php

namespace Tests\Unit\Year2020\Day10;

use App\Year2020\Day10\AdapterList;
use Tests\TestCase;

class AdapterListTest extends TestCase
{
    /**
     * @var AdapterList
     */
    private $adapterList;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adapterList = new AdapterList([
            1,
            3,
            5,
            7,
        ]);
    }

    /** @test */
    public function it_should_return_the_current_adapter_correctly(): void
    {
        // Act
        $output = $this->adapterList->current();

        // Assert
        $this->assertEquals(1, $output->rating());
    }

    /** @test */
    public function it_should_be_possible_to_receive_the_next_adapter(): void
    {
        // Act
        $previous = $this->adapterList->current();

        $this->adapterList->next();

        $current = $this->adapterList->current();

        // Assert
        $this->assertEquals(1, $previous->rating());
        $this->assertEquals(3, $current->rating());
    }

    /** @test */
    public function it_should_be_possible_the_receive_the_current_key(): void
    {
        // Act
        $previous = $this->adapterList->key();

        $this->adapterList->next();

        $current = $this->adapterList->key();

        // Assert
        $this->assertEquals(0, $previous);
        $this->assertEquals(1, $current);
    }

    /** @test */
    public function it_should_return_a_boolean_as_valid_indicator(): void
    {
        // Act
        $valid = $this->adapterList->valid();

        $this->adapterList->next();
        $this->adapterList->next();
        $this->adapterList->next();
        $this->adapterList->next();

        $invalid = $this->adapterList->valid();

        // Assert
        $this->assertTrue($valid);
        $this->assertFalse($invalid);
    }

    /** @test */
    public function it_should_be_possible_to_rewind_the_pointer(): void
    {
        // Arrange


        // Act
        $this->adapterList->next();
        $current = $this->adapterList->key();

        $this->adapterList->rewind();
        $start = $this->adapterList->key();

        // Assert
        $this->assertEquals(1, $current);
        $this->assertEquals(0, $start);
    }
}
