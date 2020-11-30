<?php

namespace App\Puzzle;

class TablePuzzle
{
    /**
     * @var Puzzle
     */
    private $puzzle;

    public function __construct(PuzzleContract $puzzle)
    {
        $this->puzzle = $puzzle;
    }

    public function headers(): array
    {
        return ['Part 1', 'Part 2'];
    }

    public function rows(): array
    {
        return [
            [$this->puzzle->partOne(), $this->puzzle->partTwo()],
        ];
    }
}
