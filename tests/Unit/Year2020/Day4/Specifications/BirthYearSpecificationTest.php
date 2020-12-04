<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\BirthYearSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class BirthYearSpecificationTest extends TestCase
{
    /**
     * @var BirthYearSpecification
     */
    private $birthYearSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->birthYearSpecification = new BirthYearSpecification(1920, 2002);
    }

    /** @test */
    public function it_should_return_false_when_there_is_no_birth_year_available(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $valid = $this->birthYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_birth_year_is_out_of_range(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'byr:1900',
        ]));

        // Act
        $valid = $this->birthYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_true_when_the_birth_year_is_within_the_range(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'byr:2000',
        ]));

        // Act
        $valid = $this->birthYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
