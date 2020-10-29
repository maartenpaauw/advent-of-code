<?php

namespace App\Providers;

use App\Puzzle\Identification\FileIdentification;
use App\Puzzle\Identification\Identification;
use App\Puzzle\Input\FileInput;
use App\Puzzle\Solution\SolutionList;
use Illuminate\Support\ServiceProvider;

class SolutionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SolutionList::class, function () {
            $solutionList = new SolutionList();

            $solutionList->add(
                $identification = new Identification(2020, 1),
                new \App\Year2020\Day1\Solution(new FileInput(new FileIdentification($identification)))
            );

            return $solutionList;
        });
    }
}
