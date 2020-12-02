<?php

namespace App\Year2020\Day2;

class PositionPolicy extends AbstractPolicy
{
    public function passes(PasswordContract $password): bool
    {
        $characters = str_split($password);

        $first = $characters[$this->first - 1] === $this->letter;
        $second = $characters[$this->second - 1] === $this->letter;

        return $first xor $second;
    }
}
