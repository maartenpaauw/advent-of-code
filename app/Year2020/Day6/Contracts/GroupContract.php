<?php

namespace App\Year2020\Day6\Contracts;

use Illuminate\Support\Collection;

interface GroupContract
{
    public function unique(): Collection;

    public function matching(): Collection;
}
