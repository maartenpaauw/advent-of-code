<?php

namespace App\Year2020\Day3;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Solution\SolutionContract;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var MountainContract
     */
    private $mountain;

    public function __construct(Collection $collection)
    {
        $this->mountain = new Mountain($collection->map(function (string $row) {
            return new Collection(str_split($row));
        }));
    }

    public function first(): Answer
    {
        $slope = new Slope(3, 1);
        $position = new Position(0, 0);
        $toboggan = new Toboggan($slope, $this->mountain, $position);

        return new IntegerAnswer($toboggan->slide()->trees());
    }

    public function second(): Answer
    {
        $slopes = new Collection([
            new Slope(1, 1),
            new Slope(3, 1),
            new Slope(5, 1),
            new Slope(7, 1),
            new Slope(1, 2),
        ]);

        $count = $slopes->reduce(function (int $trees, SlopeContract $slope) {
            $position = new Position(0, 0);
            $toboggan = new Toboggan($slope, $this->mountain, $position);
            $toboggan->slide();

            return $trees * $toboggan->trees();
        }, 1);

        return new IntegerAnswer($count);
    }
}
