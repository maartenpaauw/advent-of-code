<?php

namespace App\Year2020\Day10;

interface Output
{
    public function rating(): int;

    public function difference(Output $output): int;
}
