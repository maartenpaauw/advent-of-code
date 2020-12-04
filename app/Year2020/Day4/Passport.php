<?php

namespace App\Year2020\Day4;

use Illuminate\Support\Collection;

class Passport implements PassportContract
{
    /**
     * @var Collection
     */
    private $fields;

    public function __construct(Collection $fields)
    {
        $this->fields = $fields;
    }

    public function birthYear(): int
    {
        return $this->value('byr');
    }

    public function issueYear(): int
    {
        return $this->value('iyr');
    }

    public function expirationYear(): int
    {
        return $this->value('eyr');
    }

    public function height(): string
    {
        return $this->value('hgt');
    }

    public function hairColor(): string
    {
        return $this->value('hcl');
    }

    public function eyeColor(): string
    {
        return $this->value('ecl');
    }

    public function id(): string
    {
        return $this->value('pid');
    }

    public function countryId(): string
    {
        return $this->value('cid');
    }

    private function value(string $key): string
    {
        $field = $this->fields->first(function (string $field) use ($key) {
            return str_starts_with($field, sprintf('%s:', $key));
        }, function () {
            throw new FieldNotFoundException();
        });

        return str_replace(sprintf('%s:', $key), '', $field);
    }
}
