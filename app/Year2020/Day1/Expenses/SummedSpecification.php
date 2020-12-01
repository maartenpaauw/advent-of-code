<?php

namespace App\Year2020\Day1\Expenses;

class SummedSpecification implements ExpenseSpecification
{
    public function isSatisfiedBy(ExpenseContract ...$expenses): bool
    {
        return 2020 === array_sum(array_map(function (ExpenseContract $expense) {
            return $expense->value();
        }, $expenses));
    }
}
