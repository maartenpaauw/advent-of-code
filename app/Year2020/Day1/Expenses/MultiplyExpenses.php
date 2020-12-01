<?php

namespace App\Year2020\Day1\Expenses;

class MultiplyExpenses
{
    /**
     * @var Expense[]
     */
    private $expenses;

    public function __construct(Expense ...$expenses)
    {
        $this->expenses = $expenses;
    }

    public function product(): int
    {
        return array_product(array_map(function (Expense $expense) {
            return $expense->value();
        }, $this->expenses));
    }
}
