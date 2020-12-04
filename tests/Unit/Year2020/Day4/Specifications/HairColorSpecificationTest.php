<?php

namespace Tests\Unit\Year2020\Day4\Specifications;

use App\Year2020\Day4\Passport;
use App\Year2020\Day4\Specifications\HairColorSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class HairColorSpecificationTest extends TestCase
{
    /**
     * @var HairColorSpecification
     */
    private $hairColorSpecification;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hairColorSpecification = new HairColorSpecification();
    }

    /** @test */
    public function it_should_return_false_when_there_is_no_hair_color_available(): void
    {
        // Arrange
        $passport = new Passport(new Collection());

        // Act
        $valid = $this->hairColorSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_false_when_the_given_hair_color_is_not_valid(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'hcl:hello-world',
        ]));

        // Act
        $valid = $this->hairColorSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertFalse($valid);
    }

    /** @test */
    public function it_should_return_true_when_the_hair_color_is_valid(): void
    {
        // Arrange
        $passport = new Passport(new Collection([
            'hcl:#ff0000',
        ]));

        // Act
        $valid = $this->hairColorSpecification->isSatisfiedBy($passport);

        // Assert
        $this->assertTrue($valid);
    }
}
