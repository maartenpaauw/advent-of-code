<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\EyeColorSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class EyeColorSpecificationTest extends TestCase
{
    /**
     * @var EyeColorSpecification
     */
    private $eyeColorSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->eyeColorSpecification = new EyeColorSpecification();
    }

    /** @test */
    public function it_should_return_false_when_there_is_no_eye_color_available(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $valid = $this->eyeColorSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_eye_color_is_not_valid(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'ecl:hello-world',
        ]));

        // Act
        $valid = $this->eyeColorSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_true_when_the_eye_color_is_valid(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'ecl:oth',
        ]));

        // Act
        $valid = $this->eyeColorSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
