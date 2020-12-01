<?php

namespace Tests\Unit\Year2020\Day1\Expenses;

use App\Year2020\Day1\Expenses\Expense;
use App\Year2020\Day1\Expenses\SummedSpecification;
use Tests\TestCase;

class SummedSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_return_true_when_the_given_expenses_have_a_summed_value_of_2020(): void
    {
        // Arrange
        $summedSpecification = new SummedSpecification();
        $first = new Expense(1721);
        $second = new Expense(299);

        // Act
        $satisfied = $summedSpecification->isSatisfiedBy($first, $second);

        // Assert
        $this->assertTrue($satisfied);
    }
}
