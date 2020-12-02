<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\PasswordContract;
use App\Year2020\Day2\PasswordPolicyRecord;
use App\Year2020\Day2\PolicyContract;
use Tests\TestCase;

class PasswordPolicyTest extends TestCase
{
    /**
     * @var PasswordPolicyRecord
     */
    private $passwordPolicyRecord;

    protected function setUp(): void
    {
        $this->passwordPolicyRecord = new PasswordPolicyRecord('1-3 a: abcde');
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
