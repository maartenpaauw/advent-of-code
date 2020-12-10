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
        $ways = [1];

        foreach ($this->adapterList as $output) {
            $first = isset($ways[$output->rating() - 1]) ? $ways[$output->rating() - 1] : 0;
            $second = isset($ways[$output->rating() - 2]) ? $ways[$output->rating() - 2] : 0;
            $third = isset($ways[$output->rating() - 3]) ? $ways[$output->rating() - 3] : 0;

            $ways[$output->rating()] = array_sum([$first, $second, $third]);
        }

        return new StringAnswer(max($ways));
    }
}
