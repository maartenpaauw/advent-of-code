<?php

namespace App\Commands;

use App\Puzzle\Identification\Identification;
use App\Puzzle\Puzzle;
use App\Puzzle\Solution\NoSolutionAvailableException;
use App\Puzzle\Solution\SolutionList;
use Illuminate\Support\Carbon;
use LaravelZero\Framework\Commands\Command;

class AdventSolveCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'advent:solve';

    /**
     * @var string
     */
    protected $description = 'Solve the given puzzle';

    /**
     * @var SolutionList
     */
    private $solutionList;

    /**
     * @var Carbon
     */
    private $carbon;

    public function __construct(SolutionList $solutionList, Carbon $carbon)
    {
        parent::__construct();

        $this->solutionList = $solutionList;
        $this->carbon = $carbon;
    }

    public function handle(): int
    {
        $year = $this->anticipate('For which year?', [2020], $this->carbon->year);
        $day = $this->anticipate('For which day?', range(1, 25), min($this->carbon->day, 25));

        try {
            $identification = new Identification($year, $day);
            $solution = $this->solutionList->get($identification);
            $puzzle = new Puzzle($solution);

            $headers = ['Part 1', 'Part 2'];
            $results = [[$puzzle->partOne(), $puzzle->partTwo()]];

            $this->table($headers, $results);

            return 0;
        } catch (NoSolutionAvailableException $e) {
            $this->error($e->getMessage());

            return 1;
        }
    }
}
