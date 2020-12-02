<?php

namespace App\Year2020\Day2;

interface PolicyContract
{
    public function passes(PasswordContract $password): bool;
}
