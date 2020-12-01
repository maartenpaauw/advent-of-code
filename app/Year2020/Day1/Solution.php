<?php

namespace App\Year2020\Day1;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Solution\SolutionContract;
use App\Year2020\Day1\Expenses\Expense;
use App\Year2020\Day1\Expenses\MultiplyExpenses;
use App\Year2020\Day1\Expenses\SummedSpecification;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var Collection
     */
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection->map(function (int $entry) {
            return new Expense($entry);
        });
    }

    public function first(): Answer
    {
        $expenses = $this->collection
            ->crossJoin($this->collection)
            ->first(function (array $combination) {
                return (new SummedSpecification())->isSatisfiedBy(...$combination);
            });

        $multiplyExpenses = new MultiplyExpenses(...$expenses);

        return new IntegerAnswer($multiplyExpenses->product());
    }

    public function second(): Answer
    {
        $expenses = $this->collection
            ->crossJoin($this->collection, $this->collection)
            ->first(function (array $combination) {
                return (new SummedSpecification())->isSatisfiedBy(...$combination);
            });

        $multiplyExpenses = new MultiplyExpenses(...$expenses);

        return new IntegerAnswer($multiplyExpenses->product());
    }
}
