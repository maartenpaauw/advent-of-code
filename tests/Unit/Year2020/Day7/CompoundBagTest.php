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
        $blue = new EmptyBag('faded blue', 1);
        $black = new EmptyBag('dotted black', 1);

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
        $black = new EmptyBag('dotted black', 1);

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
        $blue = new EmptyBag('faded blue', 1);
        $black = new EmptyBag('dotted black', 1);
        $plum = new EmptyBag('vibrant plum', 1);

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
        $black = new EmptyBag('dotted black', 1);
        $plum = new EmptyBag('vibrant plum', 1);

        $olive->add($blue);
        $blue->add($black);

        // Act
        $canContain = $olive->canContain($plum);

        // Assert
        $this->assertFalse($canContain);
    }

    /** @test */
    public function it_should_return_the_size_correctly(): void
    {
        // Arrange
        $gold = new CompoundBag('shiny gold', 1);
        $red = new CompoundBag('dark red', 2);
        $orange = new CompoundBag('dark orange', 2);
        $yellow = new CompoundBag('dark yellow', 2);
        $green = new CompoundBag('dark green', 2);
        $blue = new CompoundBag('dark blue', 2);
        $violet = new EmptyBag('dark violet', 2);

        $gold->add($red);
        $red->add($orange);
        $orange->add($yellow);
        $yellow->add($green);
        $green->add($blue);
        $blue->add($violet);

        // Act
        $size = $gold->size();

        // Assert
        $this->assertEquals(127, $size);
    }
}
