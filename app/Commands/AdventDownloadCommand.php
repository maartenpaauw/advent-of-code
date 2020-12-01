<?php

namespace App\Commands;

use App\AoC\Days\Days;
use App\AoC\Days\LatestDay;
use App\AoC\InputUri;
use App\AoC\Years\Years;
use App\Puzzle\Identification\Identification;
use App\Puzzle\Identification\InputIdentification;
use App\Puzzle\Identification\RemoteIdentification;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

class AdventDownloadCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'advent:download';

    /**
     * @var string
     */
    protected $description = 'Download puzzle input';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var Carbon
     */
    private $carbon;

    /**
     * @var Days
     */
    private $days;

    /**
     * @var Years
     */
    private $years;

    public function __construct(ClientInterface $client, Carbon $carbon, Days $days, Years $years)
    {
        parent::__construct();

        $this->client = $client;
        $this->carbon = $carbon;
        $this->days = $days;
        $this->years = $years;
    }

    public function handle(): int
    {
        $year = $this->anticipate('For which year?', $this->years->toArray(), $this->carbon->year);
        $day = $this->anticipate('For which day?', $this->days->toArray(), (string) new LatestDay($this->carbon, $this->days));

        $identification = new Identification($year, $day);
        $request = new Request('GET', new InputUri(new RemoteIdentification($identification)));

        try {
            $response = $this->client->sendRequest($request);
            Storage::put(new InputIdentification($identification), $response->getBody()->getContents());

            return 0;
        } catch (ClientExceptionInterface $e) {
            return 1;
        }
    }
}
