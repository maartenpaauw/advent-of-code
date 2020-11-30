<?php

namespace Tests\Unit\AoC\Years;

use App\AoC\Years\CollectionYears;
use App\AoC\Years\Years;
use Illuminate\Support\Collection;

class CollectionYearsTest extends AbstractYearsTest
{
    protected function years(): Years
    {
        return new CollectionYears(new Collection([2020]));
    }
}
