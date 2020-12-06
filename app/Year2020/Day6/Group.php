<?php

namespace App\Year2020\Day6;

use App\Year2020\Day6\Contracts\GroupContract;
use App\Year2020\Day6\Strategies\MatchingFormAnswers;
use App\Year2020\Day6\Strategies\UniqueFormAnswers;
use Illuminate\Support\Collection;

class Group implements GroupContract
{
    /**
     * @var Collection
     */
    private $customDeclarations;

    public function __construct(Collection $customDeclarations)
    {
        $this->customDeclarations = $customDeclarations;
    }

    public function unique(): Collection
    {
        return (new UniqueFormAnswers())->get($this->customDeclarations);
    }

    public function matching(): Collection
    {
        return (new MatchingFormAnswers())->get($this->customDeclarations);
    }
}
