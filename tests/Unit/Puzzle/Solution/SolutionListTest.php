<?php

namespace Tests\Unit\Puzzle\Solution;

use App\Puzzle\Identification\Identification;
use App\Puzzle\Input\StringInput;
use App\Puzzle\Solution\FakeSolution;
use App\Puzzle\Solution\NoSolutionAvailableException;
use App\Puzzle\Solution\SolutionList;
use Tests\TestCase;

class SolutionListTest extends TestCase
{
    /** @test */
    public function it_should_register_a_solution_correctly(): void
    {
        // Arrange
        $solutionList = new SolutionList();

        $firstSolution = new FakeSolution(new StringInput('1'));
        $first = new Identification(2020, 1);

        $secondSolution = new FakeSolution(new StringInput('2'));
        $second = new Identification(2020, 2);

        // Act
        $solutionList->add($first, $firstSolution);
        $solutionList->add($second, $secondSolution);

        $firstReceived = $solutionList->get($first);
        $secondReceived = $solutionList->get($second);

        // Assert
        $this->assertEquals($firstSolution->first(), $firstReceived->first());
        $this->assertEquals($firstSolution->second(), $firstReceived->second());

        $this->assertEquals($secondSolution->first(), $secondReceived->first());
        $this->assertEquals($secondSolution->second(), $secondReceived->second());
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_solution_is_not_found(): void
    {
        // Assert
        $this->expectException(NoSolutionAvailableException::class);
        $this->expectExceptionMessage('There is no solution available for the given identification: 2020.26');

        // Arrange
        $solutionList = new SolutionList();
        $identification = new Identification(2020, 26);

        // Act
        $solutionList->get($identification);
    }
}
