<?php

namespace App\Providers;

use App\AoC\SessionCookie;
use App\AoC\Client;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\ServiceProvider;
use Psr\Http\Client\ClientInterface;

class ClientServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ClientInterface::class, function () {
            $sessionCookie = new SessionCookie(getenv('SESSION_TOKEN'));

            $cookieJar = new CookieJar();
            $cookieJar->setCookie($sessionCookie);

            return new Client($cookieJar);
        });
    }
}
