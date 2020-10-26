<?php

namespace App\Puzzle\Solution;

use App\Puzzle\Identification;
use App\Puzzle\Input\FileInput;
use App\Puzzle\Input\StringInput;
use App\Year2020\Day1\DayOne;
use Exception;

class SolutionFactory
{
    /**
     * @param int $year
     * @param int $day
     *
     * @return Solution
     *
     * @throws NoSolutionAvailableException
     */
    public function create(int $year, int $day): Solution
    {
        $identification = new Identification($year, $day);
        $stringInput = new StringInput(sprintf('input/%d/%d.txt', $year, $day));

        switch ($identification) {
            case '2020.1':
                return new DayOne(new FileInput($stringInput));
            default:
                throw new NoSolutionAvailableException('There is no solution for the given combination.');
        }
    }
}
