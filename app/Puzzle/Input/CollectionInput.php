<?php

namespace App\Puzzle\Input;

use Illuminate\Support\Collection;

class CollectionInput extends InputDecorator
{
    public function content(): Collection
    {
        return new Collection($this->origin->content());
    }
}
