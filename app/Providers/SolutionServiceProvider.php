<?php

namespace App\Providers;

use App\AoC\Days\Days;
use App\AoC\Years\Years;
use App\Puzzle\Identification\Identification;
use App\Puzzle\Identification\InputIdentification;
use App\Puzzle\Identification\SolutionIdentification;
use App\Puzzle\Input\FileInput;
use App\Puzzle\Input\ListInput;
use App\Puzzle\Solution\SolutionList;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class SolutionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SolutionList::class, function () {
            $solutionList = new SolutionList();

            $years = $this->app->make(Years::class);
            $days = $this->app->make(Days::class);

            foreach ($years->toArray() as $year) {
                foreach ($days->toArray() as $day) {
                    $identification = new Identification($year, $day);
                    $solution = (string) new SolutionIdentification($identification);

                    if (class_exists($solution)) {
                        $solution = new $solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification))))->content()));

                        $solutionList->add(
                            $identification,
                            $solution
                        );
                    }
                }
            }

            return $solutionList;
        });
    }
}
