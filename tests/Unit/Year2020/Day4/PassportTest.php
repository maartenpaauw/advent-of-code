<?php

namespace Tests\Unit\Year2020\Day4;

use App\Year2020\Day4\FieldNotFoundException;
use App\Year2020\Day4\Passport;
use Illuminate\Support\Collection;
use Tests\TestCase;

class PassportTest extends TestCase
{
    /** @test */
    public function it_should_handle_all_fields_correctly(): void
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

        // Act
        $passport = new Passport($fields);


        // Assert
        $this->assertEquals('#fffffd', $passport->hairColor());
        $this->assertEquals('147', $passport->countryId());
        $this->assertEquals('183cm', $passport->height());
        $this->assertEquals('1937', $passport->birthYear());
        $this->assertEquals('2017', $passport->issueYear());
        $this->assertEquals('2020', $passport->expirationYear());
        $this->assertEquals('860033327', $passport->passportId());
        $this->assertEquals('gry', $passport->eyeColor());
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_field_is_not_available(): void
    {
        // Assert
        $this->expectException(FieldNotFoundException::class);

        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $passport->height();
    }
}
