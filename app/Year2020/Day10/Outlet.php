<?php

namespace App\Year2020\Day10;

class Outlet implements Output
{
    public function rating(): int
    {
        return 0;
    }

    public function difference(Output $output): int
    {
        return abs($output->rating() - $this->rating());
    }
}
