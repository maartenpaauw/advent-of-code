<?php

namespace Tests\Unit\AoC;

use App\AoC\SessionCookie;
use Tests\TestCase;

class SessionCookieTest extends TestCase
{
    /**
     * @var SessionCookie
     */
    private $sessionCookie;

    protected function setUp(): void
    {
        $this->sessionCookie = new SessionCookie('secret');
    }

    /** @test */
    public function it_should_return_the_correct_domain(): void
    {
        // Act
        $domain = $this->sessionCookie->getDomain();

        // Assert
        $this->assertEquals('adventofcode.com', $domain);
    }

    /** @test */
    public function it_should_return_the_correct_name(): void
    {
        // Act
        $name = $this->sessionCookie->getName();

        // Assert
        $this->assertEquals('session', $name);
    }

    /** @test */
    public function it_should_return_the_correct_value(): void
    {
        // Act
        $value = $this->sessionCookie->getValue();

        // Assert
        $this->assertEquals('secret', $value);
    }

    /** @test */
    public function it_should_return_the_correct_discard(): void
    {
        // Act
        $discard = $this->sessionCookie->getDiscard();

        // Assert
        $this->assertTrue($discard);
    }
}
