<?php

namespace App\Year2020\Day1\Expenses;

interface ExpenseSpecification
{
    public function isSatisfiedBy(ExpenseContract ...$expenses): bool;
}
