<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\CountryIdSpecification;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class CountryIdSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_always_return_true(): void
    {
        // Arrange
        $passport = new Passport(new Collection());
        $countryIdSpecification = new CountryIdSpecification();

        // Act
        $valid = $countryIdSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
