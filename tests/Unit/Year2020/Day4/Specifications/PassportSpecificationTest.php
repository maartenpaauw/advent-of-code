<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\PassportIdSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class PassportSpecificationTest extends TestCase
{
    /**
     * @var PassportIdSpecification
     */
    private $passportIdSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->passportIdSpecification = new PassportIdSpecification();
    }

    /** @test */
    public function it_should_return_false_when_there_is_no_passport_id_available(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $valid = $this->passportIdSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_given_passport_id_is_not_valid(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'pid:hello-world',
        ]));

        // Act
        $valid = $this->passportIdSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_true_when_the_hair_color_is_valid(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'pid:012345678',
        ]));

        // Act
        $valid = $this->passportIdSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
