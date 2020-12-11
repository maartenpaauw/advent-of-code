<?php

namespace Tests\Unit\Puzzle;

use App\Puzzle\Puzzle;
use App\Puzzle\Solution\FakeSolution;
use App\Puzzle\TablePuzzle;
use Tests\TestCase;

class TablePuzzleTest extends TestCase
{
    /**
     * @var TablePuzzle
     */
    private $tablePuzzle;

    protected function setUp(): void
    {
        $solution = new FakeSolution();
        $puzzle = new Puzzle($solution);

        $this->tablePuzzle = new TablePuzzle($puzzle);
    }

    /** @test */
    public function it_should_return_the_correct_headers(): void
    {
        // Act
        $headers = $this->tablePuzzle->headers();

        // Assert
        $this->assertCount(2, $headers);

        $this->assertEquals('Part 1', $headers[0]);
        $this->assertEquals('Part 2', $headers[1]);
    }

    /** @test */
    public function it_should_return_the_correct_rows(): void
    {
        // Act
        $rows = $this->tablePuzzle->rows();

        // Assert
        $this->assertCount(1, $rows);

        $this->assertEquals('1', $rows[0][0]);
        $this->assertEquals('2', $rows[0][1]);
    }
}
