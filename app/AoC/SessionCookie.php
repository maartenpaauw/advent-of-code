<?php

namespace App\AoC;

use GuzzleHttp\Cookie\SetCookie;

class SessionCookie extends SetCookie
{
    public function __construct(string $sessionToken)
    {
        parent::__construct([
            'Domain' => 'adventofcode.com',
            'Name' => 'session',
            'Value' => $sessionToken,
            'Discard' => true,
        ]);
    }
}
