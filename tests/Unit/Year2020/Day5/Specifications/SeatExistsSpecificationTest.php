<?php

namespace Tests\Unit\Year2020\Day5\Specifications;

use App\Year2020\Day5\BasicSeat;
use App\Year2020\Day5\Specifications\SeatExistsSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SeatExistsSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_validate_the_given_seat_correctly(): void
    {
        // Arrange
        $seats = new Collection([
            new BasicSeat(10),
            new BasicSeat(20),
        ]);

        $seatExistsSpecification = new SeatExistsSpecification($seats);

        // Assert
        $this->assertTrue($seatExistsSpecification->isSatisfiedBy(new BasicSeat(15)));
        $this->assertFalse($seatExistsSpecification->isSatisfiedBy(new BasicSeat(9)));
        $this->assertFalse($seatExistsSpecification->isSatisfiedBy(new BasicSeat(21)));
    }
}
