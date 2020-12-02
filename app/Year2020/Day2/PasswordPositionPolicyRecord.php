<?php

namespace App\Year2020\Day2;

class PasswordPositionPolicyRecord implements PasswordPolicyRecord
{
    /**
     * @var string
     */
    private $left;

    /**
     * @var string
     */
    private $right;

    public function __construct(string $record)
    {
        [$this->left, $this->right] = explode(': ', $record);
    }

    public function password(): PasswordContract
    {
        return new Password($this->right);
    }

    public function policy(): PolicyContract
    {
        return new PositionPolicy($this->left);
    }
}
