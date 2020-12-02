<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\Password;
use App\Year2020\Day2\PositionPolicy;
use Tests\TestCase;

class PositionPolicyTest extends TestCase
{
    /** @test */
    public function it_should_create_a_policy_instance_from_a_given_string(): void
    {
        // Act
        $policy = PositionPolicy::create('1-3 a');

        // Assert
        $this->assertInstanceOf(PositionPolicy::class, $policy);
    }

    /** @test */
    public function it_should_validate_the_example_input_correctly(): void
    {
        // Arrange
        $first = new PositionPolicy(1, 3, 'a');
        $second = new PositionPolicy(1, 3, 'b');
        $third = new PositionPolicy(2, 9, 'c');

        // Assert
        $this->assertTrue($first->passes(new Password('abcde')));
        $this->assertFalse($second->passes(new Password('cdefg')));
        $this->assertFalse($third->passes(new Password('ccccccccc')));
    }
}
