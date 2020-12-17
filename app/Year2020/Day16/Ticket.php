<?php

namespace App\Year2020\Day16;

use App\Year2020\Day16\Specifications\NumberSpecification;

class Ticket
{
    /**
     * @var int[]
     */
    private $fields;

    public function __construct(string $fields)
    {
        $this->fields = array_map('intval', array_filter(explode(',', $fields)));
    }

    public function valid(NumberSpecification $specification): bool
    {
        foreach ($this->fields as $field) {
            if (!$specification->isSatisfiedBy($field)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return int[]
     */
    public function fields(): array
    {
        return $this->fields;
    }
}
