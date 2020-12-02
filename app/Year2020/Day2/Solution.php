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
        $this->collection = $collection;
    }

    public function first(): Answer
    {
        $count = $this->collection->map(function (string $record) {
            $explode = explode(': ', $record);

            return new PasswordPolicyRecord(new Password($explode[1]), AmountPolicy::create($explode[0]));
        })->filter(function (PasswordPolicyRecord $record) {
            return $record->policy()->passes($record->password());
        })->count();

        return new IntegerAnswer($count);
    }

    public function second(): Answer
    {
        $count = $this->collection->map(function (string $record) {
            $explode = explode(': ', $record);

            return new PasswordPolicyRecord(new Password($explode[1]), PositionPolicy::create($explode[0]));
        })->filter(function (PasswordPolicyRecord $record) {
            return $record->policy()->passes($record->password());
        })->count();

        return new IntegerAnswer($count);
    }
}
