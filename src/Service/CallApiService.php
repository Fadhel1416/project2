<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getFranceData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://public.opendatasoft.com/api/records/1.0/search/?dataset=covid19-france-vue-ensemble&q=&facet=date'

        );

        return $response->toArray();
    }

}





