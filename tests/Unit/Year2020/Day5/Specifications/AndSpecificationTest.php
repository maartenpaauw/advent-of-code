<?php

namespace Tests\Unit\Year2020\Day5\Specifications;

use App\Year2020\Day5\BasicSeat;
use App\Year2020\Day5\Specifications\AndSpecification;
use App\Year2020\Day5\Specifications\SeatExistsSpecification;
use App\Year2020\Day5\Specifications\SeatHasNeighborsSpecification;
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

        $seats = new Collection([
            new BasicSeat(10),
            new BasicSeat(11),
            new BasicSeat(13),
        ]);

        $this->andSpecification = new AndSpecification(
            new SeatExistsSpecification($seats),
            new SeatHasNeighborsSpecification($seats)
        );
    }

    /** @test */
    public function it_should_return_false_when_both_specifications_are_invalid(): void
    {
        $this->assertFalse($this->andSpecification->isSatisfiedBy(new BasicSeat(14)));
    }

    /** @test */
    public function it_should_return_false_when_only_one_is_valid(): void
    {
        $this->assertFalse($this->andSpecification->isSatisfiedBy(new BasicSeat(13)));
    }

    /** @test */
    public function it_should_return_true_when_both_are_valid(): void
    {
        $this->assertTrue($this->andSpecification->isSatisfiedBy(new BasicSeat(12)));
    }
}
