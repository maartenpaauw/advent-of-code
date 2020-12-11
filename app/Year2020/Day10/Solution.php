<?php

namespace App\Year2020\Day10;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Input\CollectionInput;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var Collection
     */
    private $adapters;

    /**
     * @var CollectionInput
     */
    private $input;

    public function __construct(Input $input)
    {
        $this->input = new CollectionInput($input);

        $this->adapters = (new Collection($input->content()))
            ->sort()
            ->mapInto(Adapter::class)
            ->prepend(new Outlet())
            ->add(new Device(new Adapter(max($input->content()))));
    }

    public function first(): Answer
    {
        $device = new \App\Year2020\Day10\Composite\Device($this->input
            ->content()
            ->sort()
            ->reduce(function (\App\Year2020\Day10\Composite\Output $output, int $rating) {
                return new \App\Year2020\Day10\Composite\Adapter($output, $rating);
            }, new \App\Year2020\Day10\Composite\Outlet())
        );

        return new IntegerAnswer(array_product(array_count_values($device->difference())));
    }

    public function second(): Answer
    {
        return new IntegerAnswer($this->adapters->reduce(function (Collection $memo, Output $output) {
            if ($memo->isEmpty()) {
                return $memo->add(new Arrangement($output->rating(), 1));
            }
            $collection = $memo->filter(function (Arrangement $arrangement) use ($output) {
                return $arrangement->until() >= $output->rating() - 3;
            });

            return $memo->add(new Arrangement($output->rating(), $collection->sum(function (Arrangement $arrangement) {
                return $arrangement->ways();
            })));
        }, new Collection())->last()->ways());
    }
}
