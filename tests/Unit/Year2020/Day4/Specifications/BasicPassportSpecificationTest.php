<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Specifications\BasicPassportSpecification;
use App\Year2020\Day4\Passport;
use Illuminate\Support\Collection;
use Tests\TestCase;

class BasicPassportSpecificationTest extends TestCase
{
    /**
     * @var BasicPassportSpecification
     */
    private $passportSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->passportSpecification = new BasicPassportSpecification();
    }

    /** @test */
    public function it_should_return_false_when_a_given_passport_is_invalid(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $valid = $this->passportSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_true_when_a_given_passport_is_valid(): void
    {
        // Arrange
        $fields = new Collection([
            'ecl:gry',
            'pid:860033327',
            'eyr:2020',
            'hcl:#fffffd',
            'byr:1937',
            'iyr:2017',
            'cid:147',
            'hgt:183cm',
        ]);

        $passport = new Passport($fields);

        // Act
        $valid = $this->passportSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
