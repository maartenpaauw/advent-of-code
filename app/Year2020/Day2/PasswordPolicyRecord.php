<?php

namespace App\Year2020\Day2;

use Illuminate\Support\Collection;

class PasswordPolicyRecord
{
    /**
     * @var Collection
     */
    private $record;

    public function __construct(string $record)
    {
        $this->record = new Collection(explode(': ', $record));
    }

    public function password(): PasswordContract
    {
        return new Password($this->record->last());
    }

    public function policy(): PolicyContract
    {
        return Policy::create($this->record->first());
    }
}
