<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\AmountPolicy;
use App\Year2020\Day2\Password;
use App\Year2020\Day2\PasswordContract;
use App\Year2020\Day2\PasswordPolicyRecord;
use App\Year2020\Day2\PolicyContract;
use Tests\TestCase;

class PasswordPolicyRecordTest extends TestCase
{
    /**
     * @var PasswordPolicyRecord
     */
    private $passwordPolicyRecord;

    protected function setUp(): void
    {
        $this->passwordPolicyRecord = new PasswordPolicyRecord(new Password('secret'), new AmountPolicy(1, 3, 'e'));
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
        $this->assertInstanceOf(PolicyContract::class, $policy);
    }
}
