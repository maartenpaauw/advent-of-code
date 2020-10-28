<?php

namespace App\Puzzle\Answer;

class IntegerAnswer implements Answer
{
    /**
     * @var int
     */
    private $answer;

    public function __construct(int $answer)
    {
        $this->answer = $answer;
    }

    public function __toString(): string
    {
        return strval($this->answer);
    }
}
