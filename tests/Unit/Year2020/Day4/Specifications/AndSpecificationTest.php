<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\AndSpecification;
use App\Year2020\Day4\Specifications\ExpirationYearSpecification;
use App\Year2020\Day4\Specifications\IssueYearSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AndSpecificationTest extends TestCase
{
    /**
     * @var AndSpecification
     */
    private $andSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->andSpecification = new AndSpecification(
            new IssueYearSpecification(2010, 2020),
            new ExpirationYearSpecification(2020, 2030)
        );
    }

    /** @test */
    public function it_should_return_false_when_both_specifications_are_invalid(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $valid = $this->andSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_when_only_one_is_valid(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'iyr:2015',
        ]));

        // Act
        $valid = $this->andSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_true_when_both_are_valid(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'iyr:2015',
            'eyr:2025',
        ]));

        // Act
        $valid = $this->andSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
