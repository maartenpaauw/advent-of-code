<?php

namespace App\Providers;

use App\AoC\Days\CollectionDays;
use App\AoC\Days\Days;
use App\AoC\Years\CollectionYears;
use App\AoC\Years\Years;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AdventOfCodeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Days::class, function () {
            return new CollectionDays(new Collection(range(1, 25)));
        });

        $this->app->bind(Years::class, function () {
            return new CollectionYears(new Collection([2020]));
        });
    }
}
