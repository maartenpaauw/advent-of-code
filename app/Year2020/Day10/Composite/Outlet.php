<?php

namespace App\Year2020\Day10\Composite;

class Outlet implements Output
{
    public function rating(): int
    {
        return 0;
    }

    public function difference(): array
    {
        return [$this->rating()];
    }
}
