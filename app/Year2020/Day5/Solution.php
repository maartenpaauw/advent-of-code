<?php

namespace App\Year2020\Day5;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Solution\SolutionContract;
use App\Year2020\Day5\Contracts\BoardingPassContract;
use App\Year2020\Day5\Contracts\SeatContract;
use App\Year2020\Day5\Specifications\AndSpecification;
use App\Year2020\Day5\Specifications\SeatExistsSpecification;
use App\Year2020\Day5\Specifications\SeatHasNeighborsSpecification;
use App\Year2020\Day5\Specifications\SeatNotTakenSpecification;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var Collection
     */
    private $boardingPasses;

    public function __construct(Collection $collection)
    {
        $this->boardingPasses = $collection
            ->map(function (string $boardingPass) {
                return new BoardingPass($boardingPass);
            });
    }

    public function first(): Answer
    {
        $answer = $this->boardingPasses
            ->max(function (BoardingPassContract $boardingPass) {
                return $boardingPass->seat()->id();
            });

        return new IntegerAnswer($answer);
    }

    public function second(): Answer
    {
        $seats = $this->boardingPasses
            ->map(function (BoardingPassContract $boardingPass) {
                return $boardingPass->seat();
            });

        /** @var SeatContract $seat */
        $seat = (new Collection(range(1, 1024)))
            ->map(function (int $id) {
                return new BasicSeat($id);
            })
            ->first(function (SeatContract $seat) use ($seats) {
                return (new AndSpecification(
                    new SeatExistsSpecification($seats),
                    new SeatHasNeighborsSpecification($seats),
                    new SeatNotTakenSpecification($seats)
                ))->isSatisfiedBy($seat);
            });

        return new IntegerAnswer($seat->id());
    }
}
