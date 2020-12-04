<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\ExpirationYearSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ExpirationYearSpecificationTest extends TestCase
{
    /**
     * @var ExpirationYearSpecification
     */
    private $expirationYearSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->expirationYearSpecification = new ExpirationYearSpecification(2020, 2030);
    }

    /** @test */
    public function it_should_return_false_when_there_is_no_expiration_year_available(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $valid = $this->expirationYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_expiration_year_is_out_of_range(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'eyr:1900',
        ]));

        // Act
        $valid = $this->expirationYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_true_when_the_expiration_year_is_within_the_range(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'eyr:2025',
        ]));

        // Act
        $valid = $this->expirationYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
