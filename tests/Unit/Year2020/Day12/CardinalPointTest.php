<?php

namespace Tests\Unit\Year2020\Day12;

use App\Year2020\Day12\CardinalPoint;
use Tests\TestCase;

class CardinalPointTest extends TestCase
{
    /** @test */
    public function it_should_return_the_degrees_of_a_given_direction_correctly(): void
    {
        // Arrange
        $north = new CardinalPoint('N');
        $east = new CardinalPoint('E');
        $south = new CardinalPoint('S');
        $west = new CardinalPoint('W');

        // Assert
        $this->assertEquals(0, $north->degrees());
        $this->assertEquals(90, $east->degrees());
        $this->assertEquals(180, $south->degrees());
        $this->assertEquals(270, $west->degrees());
    }

    /** @test */
    public function it_should_be_possible_to_turn_clockwise(): void
    {
        // Arrange
        $east = new CardinalPoint('E');

        // Act
        $south = $east->turn(90);

        // Assert
        $this->assertEquals(180, $south->degrees());
    }

    /** @test */
    public function it_should_be_possible_to_turn_counter_clockwise(): void
    {
        // Arrange
        $east = new CardinalPoint('E');

        // Act
        $north = $east->turn(90, false);

        // Assert
        $this->assertEquals(0, $north->degrees());
    }

    /** @test */
    public function it_should_never_return_a_higher_number_than_270_degrees(): void
    {
        // Arrange
        $west = new CardinalPoint('W');

        // Act
        $north = $west->turn(90);

        // Assert
        $this->assertEquals(0, $north->degrees());
    }

    /**
     * @test
     *
     * @dataProvider turnDataProvider
     *
     * @param string $currentDirection
     * @param int $degrees
     * @param bool $clockwise
     * @param string $expectedDirection
     */
    public function it_should_handle_all_given_examples_correctly(string $currentDirection, int $degrees, bool $clockwise, string $expectedDirection): void
    {
        // Arrange
        $cardinalPoint = new CardinalPoint($currentDirection);

        // Act
        $point = $cardinalPoint->turn($degrees, $clockwise);

        // Assert
        $this->assertEquals($expectedDirection, $point->label());
    }

    public function turnDataProvider(): array
    {
        return [
            'N → 0 → N' => ['N', 0, true, 'N'],
            'E → 0 → E' => ['E', 0, true, 'E'],
            'S → 0 → S' => ['S', 0, true, 'S'],
            'W → 0 → W' => ['W', 0, true, 'W'],

            'N → 90 → E' => ['N', 90, true, 'E'],
            'E → 90 → S' => ['E', 90, true, 'S'],
            'S → 90 → W' => ['S', 90, true, 'W'],
            'W → 90 → N' => ['W', 90, true, 'N'],

            'N → -90 → W' => ['N', 90, false, 'W'],
            'E → -90 → N' => ['E', 90, false, 'N'],
            'S → -90 → E' => ['S', 90, false, 'E'],
            'W → -90 → S' => ['W', 90, false, 'S'],

            'N → 180 → S' => ['N', 180, true, 'S'],
            'E → 180 → W' => ['E', 180, true, 'W'],
            'S → 180 → N' => ['S', 180, true, 'N'],
            'W → 180 → E' => ['W', 180, true, 'E'],

            'N → -180 → S' => ['N', 180, false, 'S'],
            'E → -180 → W' => ['E', 180, false, 'W'],
            'S → -180 → N' => ['S', 180, false, 'N'],
            'W → -180 → E' => ['W', 180, false, 'E'],

            'N → 270 → W' => ['N', 270, true, 'W'],
            'E → 270 → N' => ['E', 270, true, 'N'],
            'S → 270 → E' => ['S', 270, true, 'E'],
            'W → 270 → S' => ['W', 270, true, 'S'],

            'N → -270 → E' => ['N', 270, false, 'E'],
            'E → -270 → S' => ['E', 270, false, 'S'],
            'S → -270 → W' => ['S', 270, false, 'W'],
            'W → -270 → N' => ['W', 270, false, 'N'],

            'N → 360 → N' => ['N', 360, true, 'N'],
            'E → 360 → E' => ['E', 360, true, 'E'],
            'S → 360 → S' => ['S', 360, true, 'S'],
            'W → 360 → W' => ['W', 360, true, 'W'],

            'N → -360 → N' => ['N', 360, false, 'N'],
            'E → -360 → E' => ['E', 360, false, 'E'],
            'S → -360 → S' => ['S', 360, false, 'S'],
            'W → -360 → W' => ['W', 360, false, 'W'],
        ];
    }
}
