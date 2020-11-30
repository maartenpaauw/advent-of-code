<?php

namespace App\Puzzle\Solution;

use App\Puzzle\Identification\Identification;
use Illuminate\Support\Collection;

class SolutionList
{
    /**
     * @var Collection
     */
    private $solutions;

    public function __construct()
    {
        $this->solutions = new Collection();
    }

    public function add(Identification $identification, SolutionContract $solution): void
    {
        $this->solutions->put((string) $identification, $solution);
    }

    public function get(Identification $identification): SolutionContract
    {
        return $this->solutions->get((string) $identification, function () use ($identification) {
            throw new NoSolutionAvailableException(sprintf('There is no solution available for the given identification: %s', $identification));
        });
    }
}
