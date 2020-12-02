<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\Password;
use App\Year2020\Day2\Policy;
use Tests\TestCase;

class PolicyTest extends TestCase
{
    /** @test */
    public function it_should_create_a_policy_instance_from_a_given_string(): void
    {
        // Act
        $policy = Policy::create('1-3 a');

        // Assert
        $this->assertTrue($policy->passes(new Password('abcde')));
        $this->assertFalse($policy->passes(new Password('bcde')));
        $this->assertFalse($policy->passes(new Password('aaaabcde')));
    }
}
