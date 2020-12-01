<?php

namespace Tests\Unit\Year2020\Day1\Expenses;

use App\Year2020\Day1\Expenses\Expense;
use App\Year2020\Day1\Expenses\MultiplyExpenses;
use Tests\TestCase;

class MultiplyExpensesTest extends TestCase
{
    /** @test */
    public function it_should_return_the_first_part_example_correctly(): void
    {
        // Arrange
        $first = new Expense(1721);
        $second = new Expense(299);

        $multiplyExpenses = new MultiplyExpenses($first, $second);

        // Act
        $value = $multiplyExpenses->product();

        // Assert
        $this->assertEquals(514579, $value);
    }

    /** @test */
    public function it_should_return_the_second_part_example_correctly(): void
    {
        // Arrange
        $first = new Expense(979);
        $second = new Expense(366);
        $third = new Expense(675);

        $multiplyExpenses = new MultiplyExpenses($first, $second, $third);

        // Act
        $value = $multiplyExpenses->product();

        // Assert
        $this->assertEquals(241861950, $value);
    }
}
