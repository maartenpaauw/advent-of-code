<?php

namespace App\Year2020\Day2;

class PasswordAmountPolicyRecord implements PasswordPolicyRecord
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
        [$this->left, $this->right] = preg_split('(: )', $record);
    }

    public function password(): PasswordContract
    {
        return new Password($this->right);
    }

    public function policy(): PolicyContract
    {
        return new AmountPolicy($this->left);
    }
}
