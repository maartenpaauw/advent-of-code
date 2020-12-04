<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\HeightSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class HeightSpecificationTest extends TestCase
{
    /**
     * @var HeightSpecification
     */
    private $metricHeightSpecification;

    /**
     * @var HeightSpecification
     */
    private $imperialHeightSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->metricHeightSpecification = new HeightSpecification(150, 193, 'cm');
        $this->imperialHeightSpecification = new HeightSpecification(59, 76, 'in');
    }

    /** @test */
    public function it_should_return_false_when_the_given_passport_does_not_have_a_height_field(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $metricValid = $this->metricHeightSpecification->isSatisfiedBy($passport);
        $imperialValid = $this->imperialHeightSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($metricValid);
        $this->assertFalse($imperialValid);
    }

    /** @test */
    public function it_should_return_false_when_the_given_height_does_not_match_the_given_unit(): void
    {
        // Arrange
        $metricPassport = new Passport(new Collection([
            'hgt:100cm',
        ]));

        $imperialPassport = new Passport(new Collection([
            'hgt:100in',
        ]));

        // Act
        $metricValid = $this->metricHeightSpecification->isSatisfiedBy($metricPassport);
        $imperialValid = $this->imperialHeightSpecification->isSatisfiedBy($imperialPassport);

        // Assert
        $this->assertFalse($metricValid);
        $this->assertFalse($imperialValid);
    }

    /** @test */
    public function it_should_return_false_when_the_given_height_is_out_of_the_given_range(): void
    {
        // Arrange
        $metricPassport = new Passport(new Collection([
            'hgt:100cm',
        ]));

        $imperialPassport = new Passport(new Collection([
            'hgt:100in',
        ]));

        // Act
        $metricValid = $this->metricHeightSpecification->isSatisfiedBy($metricPassport);
        $imperialValid = $this->imperialHeightSpecification->isSatisfiedBy($imperialPassport);

        // Assert
        $this->assertFalse($metricValid);
        $this->assertFalse($imperialValid);
    }

    /** @test */
    public function it_should_return_true_when_the_given_height_is_in_the_given_range(): void
    {
        // Arrange
        $metricPassport = new Passport(new Collection([
            'hgt:160cm',
        ]));

        $imperialPassport = new Passport(new Collection([
            'hgt:70in',
        ]));

        // Act
        $metricValid = $this->metricHeightSpecification->isSatisfiedBy($metricPassport);
        $imperialValid = $this->imperialHeightSpecification->isSatisfiedBy($imperialPassport);

        // Assert
        $this->assertTrue($metricValid);
        $this->assertTrue($imperialValid);
    }
}
