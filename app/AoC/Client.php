<?php

namespace App\AoC;

use GuzzleHttp\Cookie\CookieJar;

class Client extends \GuzzleHttp\Client
{
    public function __construct(CookieJar $jar)
    {
        parent::__construct([
            'base_uri' => 'https://adventofcode.com',
            'cookies' => $jar,
        ]);
    }
}
