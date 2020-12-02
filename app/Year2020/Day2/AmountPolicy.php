<?php

namespace App\Year2020\Day2;

class AmountPolicy extends AbstractPolicy
{
    public function passes(PasswordContract $password): bool
    {
        $count = substr_count($password, $this->letter);

        return  ($this->first <= $count) && ($count <= $this->second);
    }
}
