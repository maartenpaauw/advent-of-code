<?php

namespace App\Year2020\Day13;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\IntegerAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Input\ListInput;
use App\Puzzle\Solution\SolutionContract;

class Solution implements SolutionContract
{
    /**
     * @var Input
     */
    private $input;

    /**
     * @var TimestampContract
     */
    private $timestamp;

    /**
     * @var Bus[]
     */
    private $shuttles;

    public function __construct(Input $input)
    {
        $this->input = $input;

        preg_match_all('/\d+/', $input->content(), $matches, PREG_UNMATCHED_AS_NULL);

        $this->timestamp = new Timestamp(intval(array_shift($matches[0])));
        $this->shuttles = array_map(function (string $id) {
            return new Shuttle($id, new Schedule($id));
        }, $matches[0]);
    }

    public function first(): Answer
    {
        $options = [];

        foreach ($this->shuttles as $shuttle) {
            $options[$shuttle->id()] = $shuttle->next($this->timestamp)->difference($this->timestamp);
        }

        asort($options);
        $shuttle = key($options);
        $time = array_shift($options);

        return new IntegerAnswer($shuttle * $time);
    }

    public function second(): Answer
    {
        $timestamp = new Timestamp(100000000000000);

        $a = new BusDepartsAtTimestampSpecification(new Shuttle(17, new Schedule(17)));
        $b = new BusDepartsAtTimestampSpecification(new Shuttle(37, new Schedule(37)));
        $c = new BusDepartsAtTimestampSpecification(new Shuttle(439, new Schedule(439)));
        $d = new BusDepartsAtTimestampSpecification(new Shuttle(29, new Schedule(29)));
        $e = new BusDepartsAtTimestampSpecification(new Shuttle(13, new Schedule(13)));
        $f = new BusDepartsAtTimestampSpecification(new Shuttle(23, new Schedule(23)));
        $g = new BusDepartsAtTimestampSpecification(new Shuttle(787, new Schedule(787)));
        $h = new BusDepartsAtTimestampSpecification(new Shuttle(41, new Schedule(41)));
        $i = new BusDepartsAtTimestampSpecification(new Shuttle(19, new Schedule(19)));

        do {
            $timestamp = $timestamp->increment();
        } while (!(
            $a->isSatisfiedBy($timestamp) &&
            $b->isSatisfiedBy($timestamp->add(11)) &&
            $c->isSatisfiedBy($timestamp->add(17)) &&
            $d->isSatisfiedBy($timestamp->add(19)) &&
            $e->isSatisfiedBy($timestamp->add(30)) &&
            $f->isSatisfiedBy($timestamp->add(40)) &&
            $g->isSatisfiedBy($timestamp->add(48)) &&
            $h->isSatisfiedBy($timestamp->add(58)) &&
            $i->isSatisfiedBy($timestamp->add(67))
        ));

        return new IntegerAnswer($timestamp->toInteger());
    }
}
