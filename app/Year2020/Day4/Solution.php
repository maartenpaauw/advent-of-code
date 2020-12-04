<?php

namespace App\Year2020\Day4;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Solution\SolutionContract;
use App\Year2020\Day4\Specifications\AndSpecification;
use App\Year2020\Day4\Specifications\BasicPassportSpecification;
use App\Year2020\Day4\Specifications\BirthYearSpecification;
use App\Year2020\Day4\Specifications\CountryIdSpecification;
use App\Year2020\Day4\Specifications\ExpirationYearSpecification;
use App\Year2020\Day4\Specifications\EyeColorSpecification;
use App\Year2020\Day4\Specifications\HairColorSpecification;
use App\Year2020\Day4\Specifications\HeightSpecification;
use App\Year2020\Day4\Specifications\IssueYearSpecification;
use App\Year2020\Day4\Specifications\OrSpecification;
use App\Year2020\Day4\Specifications\PassportIdSpecification;
use Illuminate\Support\Collection;

class Solution implements SolutionContract
{
    /**
     * @var Collection
     */
    private $passports;

    public function __construct(Collection $collection)
    {
        $this->passports = $collection->map(function (string $record) {
            return preg_split('([\n ])', $record);
        })->map(function (array $fields) {
            return new Passport(new Collection($fields));
        });
    }

    public function first(): Answer
    {
        return new IntegerAnswer($this->passports->filter(function (PassportContract $passport) {
            return (new BasicPassportSpecification())->isSatisfiedBy($passport);
        })->count());
    }

    public function second(): Answer
    {
        return new IntegerAnswer($this->passports->filter(function (PassportContract $passport) {
            return (new AndSpecification(
                new BirthYearSpecification(1920, 2002),
                new IssueYearSpecification(2010, 2020),
                new ExpirationYearSpecification(2020, 2030),
                new OrSpecification(
                    new HeightSpecification(150, 193, 'cm'),
                    new HeightSpecification(59, 76, 'in')
                ),
                new HairColorSpecification(),
                new EyeColorSpecification(),
                new PassportIdSpecification(),
                new CountryIdSpecification()
            ))->isSatisfiedBy($passport);
        })->count());
    }
}
