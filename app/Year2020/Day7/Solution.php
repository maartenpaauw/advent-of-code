<?php

namespace App\Year2020\Day7;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Solution\SolutionContract;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var Collection
     */
    private $rules;

    public function __construct(Collection $rules)
    {
        $this->rules = $rules->mapWithKeys(function (string $rule) {
            [$composite, $rules] = preg_split('/ bags contain /', $rule);
            if ('no other bags.' === $rules) {
                return [$composite => []];
            }
            $rules = array_filter(preg_split('/ bag[s]?(, |.)/', $rules));

            $bags = [];

            foreach ($rules as $rule) {
                [$amount, $leaf] = preg_split('/ /', $rule, 2);

                $bags[$leaf] = intval($amount);
            }

            return [$composite => $bags];
        });
    }

    public function first(): Answer
    {
        return new IntegerAnswer($this->rules
            ->map(function (array $leafs, string $composite) {
                return $this->tree($leafs, $composite, 1);
            })->reduce(function (int $count, Bag $bag) {
                $canContain = $bag->canContain(new EmptyBag('shiny gold', 1));

                return $canContain ? ++$count : $count;
            }, 0));
    }

    public function second(): Answer
    {
        return new IntegerAnswer($this->rules
            ->map(function (array $leafs, string $composite) {
                return $this->tree($leafs, $composite, 1);
            })
            ->first(function (Bag $bag) {
                return 'shiny gold' === $bag->color();
            })->size() - 1);
    }

    private function tree(array $leafs, string $color, int $size): Bag
    {
        if (empty($leafs)) {
            return new EmptyBag($color, $size);
        }

        $compoundBag = new CompoundBag($color, $size);

        foreach ($leafs as $color => $amount) {
            $compoundBag->add($this->tree($this->rules->get($color), $color, $amount));
        }

        return $compoundBag;
    }
}
