<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\AmountPolicy;
use App\Year2020\Day2\PasswordAmountPolicyRecord;
use App\Year2020\Day2\PasswordContract;
use Tests\TestCase;

class PasswordAmountPolicyRecordTest extends TestCase
{
    /**
     * @var PasswordAmountPolicyRecord
     */
    private $passwordPolicyRecord;

    protected function setUp(): void
    {
        $this->passwordPolicyRecord = new PasswordAmountPolicyRecord('1-3 e: secret');
    }

    /** @test */
    public function it_should_create_an_instance_of_password_correctly(): void
    {
        // Act
        $password = $this->passwordPolicyRecord->password();

        // Assert
        $this->assertInstanceOf(PasswordContract::class, $password);
    }

    /** @test */
    public function it_should_create_an_instance_of_policy_correctly(): void
    {
        // Act
        $policy = $this->passwordPolicyRecord->policy();

        // Assert
        $this->assertInstanceOf(AmountPolicy::class, $policy);
    }
}
