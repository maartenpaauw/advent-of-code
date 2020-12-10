<?php

namespace App\Year2020\Day10;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Answer\StringAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;

class Solution implements SolutionContract
{
    /**
     * @var AdapterList
     */
    private $adapterList;

    public function __construct(Input $input)
    {
        $this->adapterList = new AdapterList($input->content());
    }

    public function first(): Answer
    {
        $differences = [];
        $previous = new Outlet();

        do {
            $current = $this->adapterList->current();
            $this->adapterList->next();
            $differences[] = $previous->difference($current);
            $previous = $current;
        } while ($this->adapterList->valid());

        $device = new Device($current);
        $differences[] = $device->difference($current);

        return new IntegerAnswer(array_product(array_count_values($differences)));
    }

    public function second(): Answer
    {
        return new StringAnswer('—');
    }
}
