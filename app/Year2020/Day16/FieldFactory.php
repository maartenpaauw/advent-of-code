<?php

namespace App\Year2020\Day16;

class FieldFactory
{
    /**
     * @param string[] $fields
     *
     * @return Field[]
     */
    public static function parse(array $fields): array
    {
        return array_map(function (string $field) {
            preg_match('/^(?<label>^\w+( \w+)?): (?P<first>\d+-\d+) or (?P<second>\d+-\d+)$/', $field, $matches);

            return new Field($matches['label'], [new Range($matches['first']), new Range($matches['second'])]);
        }, $fields);
    }
}
