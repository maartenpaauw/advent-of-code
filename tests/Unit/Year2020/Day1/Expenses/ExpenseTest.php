<?php

namespace Tests\Unit\Year2020\Day1\Expenses;

use App\Year2020\Day1\Expenses\Expense;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    /** @test */
    public function it_should_return_the_value_correctly(): void
    {
        // Arrange
        $expense = new Expense(1721);

        // Act
        $value = $expense->value();

        // Assert
        $this->assertEquals(1721, $value);
    }
}
