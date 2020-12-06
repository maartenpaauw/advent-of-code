<?php

namespace App\Year2020\Day6;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Solution\SolutionContract;
use App\Year2020\Day6\Strategies\MatchingGroupAnswers;
use App\Year2020\Day6\Strategies\UniqueGroupAnswers;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var Collection
     */
    private $groups;

    public function __construct(Collection $groups)
    {
        $this->groups = $groups->map(function (string $group) {
            $customDeclarations = (new Collection(preg_split('/\s+/', $group, -1, PREG_SPLIT_NO_EMPTY)))
                ->map(function (string $answers) {
                    return new CustomsDeclaration($answers);
                });

            return new Group($customDeclarations);
        });
    }

    public function first(): Answer
    {
        return new IntegerAnswer((new UniqueGroupAnswers())->count($this->groups));
    }

    public function second(): Answer
    {
        return new IntegerAnswer((new MatchingGroupAnswers())->count($this->groups));
    }
}
