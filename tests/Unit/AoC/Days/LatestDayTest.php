<?php

namespace Tests\Unit\AoC\Days;

use App\AoC\Days\CollectionDays;
use App\AoC\Days\LatestDay;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Tests\TestCase;

class LatestDayTest extends TestCase
{
    /** @test */
    public function it_should_return_the_current_day_if_it_is_before_the_last_day(): void
    {
        // Arrange
        Carbon::setTestNow(Carbon::create(2020, 12, 9));

        $carbon = Carbon::now();
        $days = new CollectionDays(new Collection(range(1, 25)));

        // Act
        $latestDay = new LatestDay($carbon, $days);

        // Assert
        $this->assertEquals('9', $latestDay);
    }

    /** @test */
    public function it_should_return_the_last_day_if_the_current_day_is_after_the_last_day(): void
    {
        // Arrange
        Carbon::setTestNow(Carbon::create(2020, 12, 26));

        $carbon = Carbon::now();
        $days = new CollectionDays(new Collection(range(1, 25)));

        // Act
        $latestDay = new LatestDay($carbon, $days);

        // Assert
        $this->assertEquals('25', $latestDay);
    }
}
