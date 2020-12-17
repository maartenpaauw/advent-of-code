<?php

namespace App\Year2020\Day16;

use App\Puzzle\Answer\Answer;
use App\Puzzle\Answer\StringAnswer;
use App\Puzzle\Input\Input;
use App\Puzzle\Solution\SolutionContract;
use App\Year2020\Day16\Specifications\OrSpecification;

class Solution implements SolutionContract
{
    /**
     * @var Field[]
     */
    private $rules;

    /**
     * @var Ticket
     */
    private $ticket;

    /**
     * @var Ticket[]
     */
    private $tickets;

    public function __construct(Input $input)
    {
        [$rules, $ticket, $tickets] = preg_split('/\n\n((your|nearby) ticket[s]?:\n)/', $input->content());

        $rules = preg_split('/\n/', $rules);

        $this->ticket = new Ticket(preg_split('/\n/', $ticket)[0]);
        $this->tickets = array_map(function (string $values) {
            return new Ticket($values);
        }, preg_split('/\n/', $tickets));

        $this->rules = FieldFactory::parse($rules);
    }

    public function first(): Answer
    {
        $invalid = [];

        foreach ($this->tickets as $ticket) {
            $values = $ticket->fields();

            foreach ($values as $value) {
                $valid = false;
                foreach ($this->rules as $field) {
                    if ($field->isSatisfiedBy($value)) {
                        $valid = true;
                        break;
                    }
                }

                if (!$valid) {
                    $invalid[] = $value;
                }
            }
        }

        return new StringAnswer(array_sum($invalid));
    }

    public function second(): Answer
    {
        $tickets = array_filter($this->tickets, function (Ticket $ticket) {
            return $ticket->valid(new OrSpecification(...$this->rules));
        });

        $counter = [];

        foreach ($this->rules as $rule) {
            foreach (range(0, count($this->rules) - 1) as $index) {
                $counter[$rule->label()][$index] = true;
            }
        }

        foreach ($tickets as $ticket) {
            foreach ($this->rules as $rule) {
                foreach ($ticket->fields() as $index => $field) {
                    if (!$rule->isSatisfiedBy($field)) {
                        $counter[$rule->label()][$index] = false;
                    }
                }
            }
        }

        $possibilities = array_map(function ($rules) {
            return array_keys(array_filter($rules, function ($count) {
                return $count;
            }));
        }, $counter);

        array_multisort(array_map('count', $possibilities), SORT_ASC, $possibilities);

        $result = [];

        foreach ($possibilities as $name => $possibility) {
            $result[$name] = array_values(array_diff(array_values($possibility), array_values($result)))[0];
        }

        asort($result);

        dump($result);

        $departureFields = array_filter($result, function ($rule) {
            return 0 === strpos($rule, 'departure');
        }, ARRAY_FILTER_USE_KEY);

        $product = [];

        foreach ($departureFields as $index) {
            $product[] = $this->ticket->fields()[$index];
        }

        return new StringAnswer(array_product($product));
    }
}
