<?php

namespace Tests\Unit\Year2020\Day15;

use App\Year2020\Day15\Solution;
use Tests\TestCase;

class SolutionTest extends TestCase
{
    /** @test */
    public function it_should_handle_the_example_inputs_correctly(): void
    {
        // Arrange
        $a = new Solution([0, 3, 6]);
//        $a = new Solution([1, 3, 2]);
//        $b = new Solution([2, 1, 3]);
//        $c = new Solution([1, 2, 3]);
//        $d = new Solution([2, 3, 1]);
//        $e = new Solution([3, 2, 1]);
//        $f = new Solution([3, 1, 2]);

        // Assert
        $this->assertEquals('436', $a->first());
//        $this->assertEquals('10', $b->first());
//        $this->assertEquals('27', $c->first());
//        $this->assertEquals('78', $d->first());
//        $this->assertEquals('438', $e->first());
//        $this->assertEquals('1836', $f->first());
    }
}
