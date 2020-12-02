<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\Password;
use App\Year2020\Day2\AmountPolicy;
use Tests\TestCase;

class AmountPolicyTest extends TestCase
{
    /** @test */
    public function it_should_validate_the_example_input_correctly(): void
    {
        // Arrange
        $first = new AmountPolicy('1-3 a');
        $second = new AmountPolicy('1-3 b');
        $third = new AmountPolicy('2-9 c');

        // Assert
        $this->assertTrue($first->passes(new Password('abcde')));
        $this->assertFalse($second->passes(new Password('cdefg')));
        $this->assertTrue($third->passes(new Password('ccccccccc')));
    }
}
