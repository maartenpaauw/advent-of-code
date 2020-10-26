<?php

namespace App\Puzzle\Answer;

class StringAnswer implements Answer
{
    /**
     * @var string
     */
    private $answer;

    public function __construct(string $answer)
    {
        $this->answer = $answer;
    }

    public function __toString(): string
    {
        return $this->answer;
    }
}
