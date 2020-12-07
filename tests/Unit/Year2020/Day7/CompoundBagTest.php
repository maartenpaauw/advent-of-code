<?php

namespace Tests\Unit\Year2020\Day7;

use App\Year2020\Day7\CompoundBag;
use App\Year2020\Day7\EmptyBag;
use PHPUnit\Framework\TestCase;

class CompoundBagTest extends TestCase
{
    /** @test */
    public function it_should_return_the_color_name_correctly(): void
    {
        // Arrange
        $yellow = new CompoundBag('muted yellow', 1);

        // Assert
        $this->assertEquals('muted yellow', $yellow->color());
    }

    /** @test */
    public function it_should_return_true_when_it_can_hold_the_given_bag(): void
    {
        // Arrange
        $olive = new CompoundBag('dark olive', 1);
        $blue = new EmptyBag('faded blue');
        $black = new EmptyBag('dotted black');

        $olive->add($blue);
        $olive->add($black);

        // Act
        $canContain = $olive->canContain($blue);

        // Assert
        $this->assertTrue($canContain);
    }

    /** @test */
    public function it_should_return_true_when_it_can_hold_the_given_bag_recursively(): void
    {
        // Arrange
        $olive = new CompoundBag('dark olive', 1);
        $blue = new CompoundBag('faded blue', 1);
        $black = new EmptyBag('dotted black');

        $olive->add($blue);
        $blue->add($black);

        // Act
        $canContain = $olive->canContain($black);

        // Assert
        $this->assertTrue($canContain);
    }

    /** @test */
    public function it_should_return_false_when_it_can_not_hold_the_given_bag(): void
    {
        // Arrange
        $olive = new CompoundBag('dark olive', 1);
        $blue = new EmptyBag('faded blue');
        $black = new EmptyBag('dotted black');
        $plum = new EmptyBag('vibrant plum');

        $olive->add($blue);
        $olive->add($black);

        // Act
        $canContain = $olive->canContain($plum);

        // Assert
        $this->assertFalse($canContain);
    }

    /** @test */
    public function it_should_return_false_when_it_can_not_hold_the_given_bag_recursively(): void
    {
        // Arranger
        $olive = new CompoundBag('dark olive', 1);
        $blue = new CompoundBag('faded blue', 1);
        $black = new EmptyBag('dotted black');
        $plum = new EmptyBag('vibrant plum');

        $olive->add($blue);
        $blue->add($black);

        // Act
        $canContain = $olive->canContain($plum);

        // Assert
        $this->assertFalse($canContain);
    }
}
