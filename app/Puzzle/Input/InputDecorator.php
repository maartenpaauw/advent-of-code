<?php

namespace App\Puzzle\Input;

abstract class InputDecorator implements Input
{
    /**
     * @var Input
     */
    protected $origin;

    public function __construct(Input $origin)
    {
        $this->origin = $origin;
    }

    public function content()
    {
        return $this->origin->content();
    }
}
