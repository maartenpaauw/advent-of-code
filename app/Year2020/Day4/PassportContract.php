<?php

namespace App\Year2020\Day4;

interface PassportContract
{
    /**
     * @throws FieldNotFoundException
     */
    public function id(): string;

    /**
     * @throws FieldNotFoundException
     */
    public function birthYear(): int;

    /**
     * @throws FieldNotFoundException
     */
    public function issueYear(): int;

    /**
     * @throws FieldNotFoundException
     */
    public function expirationYear(): int;

    /**
     * @throws FieldNotFoundException
     */
    public function height(): string;

    /**
     * @throws FieldNotFoundException
     */
    public function hairColor(): string;

    /**
     * @throws FieldNotFoundException
     */
    public function eyeColor(): string;

    /**
     * @throws FieldNotFoundException
     */
    public function countryId(): string;
}
