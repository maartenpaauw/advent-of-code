<?php

namespace Tests\Unit\Year2020\Day5\Specifications;

use App\Year2020\Day5\BasicSeat;
use App\Year2020\Day5\Specifications\SeatNotTakenSpecification;
use Illuminate\Support\Collection;
use Tests\TestCase;

class SeatNotTakenSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_validate_the_given_seat_correctly(): void
    {
        // Arrange
        $seats = new Collection([
            new BasicSeat(10),
            new BasicSeat(12),
        ]);

        $seatNotTakenSpecification = new SeatNotTakenSpecification($seats);

        // Assert
        $this->assertFalse($seatNotTakenSpecification->isSatisfiedBy(new BasicSeat(10)));
        $this->assertTrue($seatNotTakenSpecification->isSatisfiedBy(new BasicSeat(11)));
        $this->assertFalse($seatNotTakenSpecification->isSatisfiedBy(new BasicSeat(12)));
    }
}
