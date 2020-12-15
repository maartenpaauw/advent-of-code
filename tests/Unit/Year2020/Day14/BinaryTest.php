<?php

namespace Tests\Unit\Year2020\Day14;

use App\Year2020\Day14\Binary;
use Tests\TestCase;

class BinaryTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_binary_or_operation_correctly(): void
    {
        // Arrange
        $a = new Binary('0101010');
        $b = new Binary('1010101');

        // Act
        $result = $a->or($b);

        // Assert
        $this->assertEquals('1111111', $result);
    }

    /** @test */
    public function it_should_handle_the_binary_and_operation_correctly(): void
    {
        // Arrange
        $a = new Binary('0101010');
        $b = new Binary('1010101');

        // Act
        $result = $a->and($b);

        // Assert
        $this->assertEquals('0000000', $result);
    }

    /** @test */
    public function it_should_be_possible_to_convert_a_binary_instance_to_a_string(): void
    {
        // Arrange
        $binary = new Binary('000000000000000000000000000000001011');

        // Act
        $string = (string) $binary;

        // Assert
        $this->assertEquals('000000000000000000000000000000001011', $string);
    }
}
