<?php

namespace App\Year2020\Day13;

class Shuttle implements Bus
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Schedule
     */
    private $schedule;

    public function __construct(int $id, Schedule $schedule)
    {
        $this->id = $id;
        $this->schedule = $schedule;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function departs(TimestampContract $timestamp): bool
    {
        return $this->schedule->departs($timestamp);
    }

    public function next(TimestampContract $timestamp): Timestamp
    {
        while (!$this->schedule->departs($timestamp)) {
            $timestamp = $timestamp->increment();
        }

        return $timestamp;
    }
}
