<?php

namespace Tests\Unit\Year2020\Day5\Specifications;

use App\Year2020\Day5\BasicSeat;
use App\Year2020\Day5\Specifications\SeatHasNeighborsSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SeatHasNeighborsSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_validate_the_given_seat_correctly(): void
    {
        // Arrange
        $seats = new Collection([
            new BasicSeat(10),
            new BasicSeat(12),
            new BasicSeat(13),
            new BasicSeat(14),
            new BasicSeat(17),
        ]);

        $seatHasNeighborsSpecification = new SeatHasNeighborsSpecification($seats);

        // Assert
        $this->assertFalse($seatHasNeighborsSpecification->isSatisfiedBy(new BasicSeat(10)));
        $this->assertTrue($seatHasNeighborsSpecification->isSatisfiedBy(new BasicSeat(11)));
        $this->assertTrue($seatHasNeighborsSpecification->isSatisfiedBy(new BasicSeat(13)));
        $this->assertFalse($seatHasNeighborsSpecification->isSatisfiedBy(new BasicSeat(15)));
        $this->assertFalse($seatHasNeighborsSpecification->isSatisfiedBy(new BasicSeat(17)));
    }
}
