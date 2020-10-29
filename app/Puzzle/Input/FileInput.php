<?php

namespace App\Puzzle\Input;

use Illuminate\Support\Facades\Storage;

class FileInput implements Input
{
    /**
     * @var string
     */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function content(): string
    {
        return Storage::get($this->path);
    }
}
