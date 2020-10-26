<?php

namespace App\Puzzle\Input;

class CharacterInput extends InputDecorator
{
    public function content(): array
    {
        return str_split($this->origin->content());
    }
}
