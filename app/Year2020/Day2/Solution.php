<?php

namespace App\Year2020\Day2;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Answer\StringAnswer;
use App\Puzzle\Solution\SolutionContract;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var Collection
     */
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection->map(function (string $record) {
            return new PasswordPolicyRecord($record);
        });
    }

    public function first(): Answer
    {
        return new IntegerAnswer($this->collection->filter(function (PasswordPolicyRecord $record) {
            return $record->policy()->passes($record->password());
        })->count());
    }

    public function second(): Answer
    {
        return new StringAnswer('—');
    }
}
