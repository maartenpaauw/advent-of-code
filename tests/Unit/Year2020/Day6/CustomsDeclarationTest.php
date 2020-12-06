<?php

namespace Tests\Unit\Year2020\Day6;

use App\Year2020\Day6\CustomsDeclaration;
use Tests\TestCase;

class CustomsDeclarationTest extends TestCase
{
    /** @test */
    public function it_should_convert_the_given_string_to_an_array(): void
    {
        // Arrange
        $form = new CustomsDeclaration('abc');

        // Assert
        $this->assertEquals(['a', 'b', 'c'], $form->toArray());
    }
}
