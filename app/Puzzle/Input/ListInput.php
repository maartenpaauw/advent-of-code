<?php

namespace App\Puzzle\Input;

class ListInput extends InputDecorator
{
    /**
     * @var string
     */
    private $delimiter;

    public function __construct(Input $origin, string $delimiter = '\n')
    {
        parent::__construct($origin);

        $this->delimiter = $delimiter;
    }

    public function content(): array
    {
        return array_filter(preg_split(sprintf('/%s/', $this->delimiter), $this->origin->content()));
    }
}
