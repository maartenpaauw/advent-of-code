<?php

namespace Tests\Unit\Year2020\Day9;

use App\Year2020\Day9\ContiguousSet;
use App\Year2020\Day9\EncryptionWeakness;
use Tests\TestCase;

class EncryptionWeaknessTest extends TestCase
{
    /** @test */
    public function it_should_convert_and_contiguous_set_to_an_integer_correctly(): void
    {
        // Arrange
        $encryptionWeakness = new EncryptionWeakness(
            new ContiguousSet([15, 25, 47, 40])
        );

        // Act
        $integer = $encryptionWeakness->toInteger();

        // Assert
        $this->assertEquals(62, $integer);
    }
}
