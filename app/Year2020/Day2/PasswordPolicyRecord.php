<?php

namespace App\Year2020\Day2;

class PasswordPolicyRecord
{
    /**
     * @var PasswordContract
     */
    private $password;

    /**
     * @var PolicyContract
     */
    private $policy;

    public function __construct(PasswordContract $password, PolicyContract $policy)
    {
        $this->password = $password;
        $this->policy = $policy;
    }

    public function password(): PasswordContract
    {
        return $this->password;
    }

    public function policy(): PolicyContract
    {
        return $this->policy;
    }
}
