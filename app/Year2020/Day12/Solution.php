<?php

namespace App\Year2020\Day12;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;
use App\Year2020\Day12\Geo\LatLng;
use App\Year2020\Day12\Meteorology\CardinalPoint;

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
        $start = new LatLng(0, 0);
        $ship = new Ship(
            new CardinalPoint('E'),
            $start
        );

        foreach ($this->input->content() as $instruction) {
            $ship = $ship->move($instruction);
        }

        return new IntegerAnswer($start->distanceTo($ship->position()));
    }

    public function second(): Answer
    {
        $start = new LatLng(0, 0);
        $ship = new WaypointShip(
            new LatLng(10, 1),
            $start
        );

        foreach ($this->input->content() as $instruction) {
            $ship = $ship->move($instruction);
        }

        return new IntegerAnswer($start->distanceTo($ship->position()));
    }
}
