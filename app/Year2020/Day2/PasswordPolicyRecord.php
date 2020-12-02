<?php

namespace App\Year2020\Day2;

interface PasswordPolicyRecord
{
    public function password(): PasswordContract;

    public function policy(): PolicyContract;
}
