<?php

namespace Tests\Unit\AoC\Days;

use App\AoC\Days\CollectionDays;
use App\AoC\Days\Days;
use Illuminate\Support\Collection;

class CollectionDaysTest extends AbstractDaysTest
{
    public function days(): Days
    {
        return new CollectionDays(new Collection(range(1, 25)));
    }
}
