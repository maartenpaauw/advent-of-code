<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\PasswordAmountPolicyRecord;
use App\Year2020\Day2\PasswordContract;
use App\Year2020\Day2\PasswordPositionPolicyRecord;
use App\Year2020\Day2\PositionPolicy;
use Tests\TestCase;

class PasswordPositionPolicyRecordTest extends TestCase
{
    /**
     * @var PasswordAmountPolicyRecord
     */
    private $passwordPolicyRecord;

    protected function setUp(): void
    {
        $this->passwordPolicyRecord = new PasswordPositionPolicyRecord('1-3 e: secret');
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
        $this->assertInstanceOf(PositionPolicy::class, $policy);
    }
}
