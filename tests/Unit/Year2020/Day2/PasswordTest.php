<?php

namespace Tests\Unit\Year2020\Day2;

use App\Year2020\Day2\Password;
use Tests\TestCase;

class PasswordTest extends TestCase
{
    /** @test */
    public function it_should_be_possible_to_convert_the_password_to_a_string(): void
    {
        // Arrange
        $password = new Password('secret');

        // Assert
        $this->assertEquals('secret', $password);
    }

}
