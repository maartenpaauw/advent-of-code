<?php

namespace App\Providers;

use App\Puzzle\Identification\Identification;
use App\Puzzle\Identification\InputIdentification;
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

            $solutionList->add(
                $identification = new Identification(2020, 1),
                new \App\Year2020\Day1\Solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification))))->content()))
            );

            $solutionList->add(
                $identification = new Identification(2020, 2),
                new \App\Year2020\Day2\Solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification))))->content()))
            );

            $solutionList->add(
                $identification = new Identification(2020, 3),
                new \App\Year2020\Day3\Solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification))))->content()))
            );

            $solutionList->add(
                $identification = new Identification(2020, 4),
                new \App\Year2020\Day4\Solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification)), '\n\n'))->content()))
            );

            return $solutionList;
        });
    }
}
