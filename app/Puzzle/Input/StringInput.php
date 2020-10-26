<?php

namespace App\Puzzle\Input;

class StringInput implements Input
{
    /**
     * @var string
     */
    private $input;

    public function __construct(string $input = '')
    {
        $this->input = $input;
    }

    public function content(): string
    {
        return $this->input;
    }
}
