<?php

namespace App\Year2020\Day14;

class FloatingBitMask implements BitMaskContract
{
    /**
     * @var string
     */
    private $mask;

    /**
     * @var Binary
     */
    private $a;

    public function __construct(string $mask)
    {
        $this->mask = $mask;
        $this->a = new Binary(str_replace('X', 0, $mask));
    }

    /**
     * @param Binary $binary
     *
     * @return Binary[]
     */
    public function apply(Binary $binary): array
    {
        $binaries = [];
        $binary = str_split($binary);
        $count = substr_count($this->mask, 'X');

        for ($i = 0; $i < 2 ** $count; ++$i) {
            $replacements = str_pad(decbin($i), $count, '0', STR_PAD_LEFT);
            $mask = str_split(preg_replace(array_fill(0, $count, '/X/'), str_split($replacements), $this->mask, 1));
            $bits = [];

            foreach (str_split($this->mask) as $index => $bit) {
                if ('0' === $bit) {
                    $bits[] = $binary[$index];
                } elseif ('1' === $bit) {
                    $bits[] = '1';
                } else {
                    $bits[] = $mask[$index];
                }
            }

            $binaries[] = new Binary(implode('', $bits));
        }

        var_dump($binaries);

        return $binaries;
    }
}
