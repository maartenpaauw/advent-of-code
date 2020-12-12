<?php

namespace App\Year2020\Day12;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Answer\StringAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;

class Solution implements SolutionContract
{
    /**
     * @var Input
     */
    private $input;

    public function __construct(Input $input)
    {
        $this->input = $input;
    }

    public function first(): Answer
    {
        $start = new Position(
            new CardinalPoint('E'),
            new LatLng(0, 0)
        );

        $ship = new Ship($start);
        foreach ($this->input->content() as $instruction) {
            $ship->move($instruction);
        }

        return new IntegerAnswer($start->latLng()->distanceTo($ship->position()->latLng()));
    }

    public function second(): Answer
    {
        $ship = new WaypointShip(
            new LatLng(10, 1)
        );

        foreach ($this->input->content() as $instruction) {
            $ship->move($instruction);
        }

        return new IntegerAnswer($ship->position()->latLng()->distanceTo(new LatLng(0, 0)));
    }
}
