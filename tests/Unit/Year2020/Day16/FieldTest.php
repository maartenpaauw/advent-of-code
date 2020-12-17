<?php

namespace Tests\Unit\Year2020\Day16;

use App\Year2020\Day16\Field;
use App\Year2020\Day16\Range;
use Tests\TestCase;

class FieldTest extends TestCase
{
    /** @test */
    public function it_should_return_true_when_the_given_value_is_valid(): void
    {
        // Arrange
        $field = new Field('class', [new Range('1-3'), new Range('5-7')]);

        // Assert
        $this->assertTrue($field->isSatisfiedBy(1));
        $this->assertTrue($field->isSatisfiedBy(2));
        $this->assertTrue($field->isSatisfiedBy(3));
        $this->assertTrue($field->isSatisfiedBy(5));
        $this->assertTrue($field->isSatisfiedBy(6));
        $this->assertTrue($field->isSatisfiedBy(7));
    }

    /** @test */
    public function it_should_return_false_when_the_given_value_is_invalid(): void
    {
        // Arrange
        $field = new Field('class', [new Range('1-3'), new Range('5-7')]);

        // Assert
        $this->assertFalse($field->isSatisfiedBy(0));
        $this->assertFalse($field->isSatisfiedBy(4));
        $this->assertFalse($field->isSatisfiedBy(8));
    }
}
