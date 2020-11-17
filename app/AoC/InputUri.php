<?php

namespace App\AoC;

use App\Puzzle\Identification\RemoteIdentification;
use GuzzleHttp\Psr7\Uri;

class InputUri extends Uri
{
    public function __construct(RemoteIdentification $remoteIdentification)
    {
        parent::__construct((string) $remoteIdentification);
    }
}
