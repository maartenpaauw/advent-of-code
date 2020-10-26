<?php

namespace App\Puzzle\Input;

use Illuminate\Support\Facades\Storage;

class FileInput extends InputDecorator
{
    public function content(): string
    {
        return Storage::get($this->origin->content());
    }
}
