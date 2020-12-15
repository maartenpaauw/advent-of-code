<?php

namespace Tests\Unit\Year2020\Day14;

use App\Year2020\Day14\Binary;
use App\Year2020\Day14\BitMask;
use Tests\TestCase;

class BitMaskTest extends TestCase
{
    /** @test */
    public function it_should_apply_the_given_mask_correctly(): void
    {
        // Arrange
        $bitMask = new BitMask('XXXXXXXXXXXXXXXXXXXXXXXXXXXXX1XXXX0X');

        // Act
        $first = $bitMask->apply(new Binary('000000000000000000000000000000001011'));
        $second = $bitMask->apply(new Binary('000000000000000000000000000001100101'));
        $third = $bitMask->apply(new Binary('000000000000000000000000000000000000'));

        // Assert
        $this->assertEquals('000000000000000000000000000001001001', $first);
        $this->assertEquals('000000000000000000000000000001100101', $second);
        $this->assertEquals('000000000000000000000000000001000000', $third);
    }
}
