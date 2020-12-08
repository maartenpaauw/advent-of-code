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

            $solutionList->add(
                $identification = new Identification(2020, 5),
                new \App\Year2020\Day5\Solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification))))->content()))
            );

            $solutionList->add(
                $identification = new Identification(2020, 6),
                new \App\Year2020\Day6\Solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification)), '\n\n'))->content()))
            );

            $solutionList->add(
                $identification = new Identification(2020, 7),
                new \App\Year2020\Day7\Solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification))))->content()))
            );

            $solutionList->add(
                $identification = new Identification(2020, 8),
                new \App\Year2020\Day8\Solution(new Collection((new ListInput(new FileInput(new InputIdentification($identification))))->content()))
            );

            return $solutionList;
        });
    }
}
