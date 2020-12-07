<?php

namespace Tests\Unit\Year2020\Day7;

use App\Year2020\Day7\Solution;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_first_example_input_correctly(): void
    {
        // Arrange
        $solution = new Solution(new Collection([
            'light red bags contain 1 bright white bag, 2 muted yellow bags.',
            'dark orange bags contain 3 bright white bags, 4 muted yellow bags.',
            'bright white bags contain 1 shiny gold bag.',
            'muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.',
            'shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.',
            'dark olive bags contain 3 faded blue bags, 4 dotted black bags.',
            'vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.',
            'faded blue bags contain no other bags.',
            'dotted black bags contain no other bags.',
        ]));

        // Act
        $first = $solution->first();
        $second = $solution->second();

        // Assert
        $this->assertEquals('4', $first);
        $this->assertEquals('32', $second);
    }

    /** @test */
    public function it_should_handle_the_second_example_input_correctly(): void
    {
        // Arrange
        $solution = new Solution(new Collection([
            'shiny gold bags contain 2 dark red bags.',
            'dark red bags contain 2 dark orange bags.',
            'dark orange bags contain 2 dark yellow bags.',
            'dark yellow bags contain 2 dark green bags.',
            'dark green bags contain 2 dark blue bags.',
            'dark blue bags contain 2 dark violet bags.',
            'dark violet bags contain no other bags.',
        ]));

        // Act
        $second = $solution->second();

        // Assert
        $this->assertEquals('126', $second);
    }
}
