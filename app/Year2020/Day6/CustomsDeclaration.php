<?php

namespace App\Year2020\Day6;

use App\Year2020\Day6\Contracts\FormContract;

class CustomsDeclaration implements FormContract
{
    /**
     * @var string
     */
    private $answers;

    public function __construct(string $answers)
    {
        $this->answers = $answers;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return str_split($this->answers);
    }
}
