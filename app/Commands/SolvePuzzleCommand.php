<?php

namespace App\Commands;

use App\Puzzle\Puzzle;
use App\Puzzle\Solution\NoSolutionAvailableException;
use App\Puzzle\Solution\SolutionFactory;
use Illuminate\Support\Carbon;
use LaravelZero\Framework\Commands\Command;

class SolvePuzzleCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'puzzle:solve';

    /**
     * @var string
     */
    protected $description = 'This command will solve the given puzzle';

    /**
     * @var SolutionFactory
     */
    private $solutionFactory;

    /**
     * @var Carbon
     */
    private $carbon;

    public function __construct(SolutionFactory $solutionFactory, Carbon $carbon)
    {
        parent::__construct();

        $this->solutionFactory = $solutionFactory;
        $this->carbon = $carbon;
    }

    public function handle(): void
    {
        $year = $this->anticipate('For which year?', [2020], $this->carbon->year);
        $day = $this->anticipate('For which day?', range(1, 25), $this->carbon->day);

        try {
            $solution = $this->solutionFactory->create($year, $day);

            $puzzle = new Puzzle($solution);

            $headers = ['Part 1', 'Part 2'];
            $results = [[$puzzle->partOne(), $puzzle->partTwo()]];

            $this->table($headers, $results);
        } catch (NoSolutionAvailableException $e) {
            $this->error($e->getMessage());
        }
    }
}
