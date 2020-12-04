<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\IssueYearSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class IssueYearSpecificationTest extends TestCase
{
    /**
     * @var IssueYearSpecification
     */
    private $issueYearSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->issueYearSpecification = new IssueYearSpecification(2010, 2020);
    }

    /** @test */
    public function it_should_return_false_when_there_is_no_issue_year_available(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $valid = $this->issueYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_issue_year_is_out_of_range(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'iyr:1900',
        ]));

        // Act
        $valid = $this->issueYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_true_when_the_issue_year_is_within_the_range(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'iyr:2015',
        ]));

        // Act
        $valid = $this->issueYearSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
