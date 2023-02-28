<?php

namespace DenizTezcan\Channable\Http;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    protected string $token;
    protected string $baseUrl;

    public function __construct()
    {
        $this->token = config('channable.bearer-token');
        $this->baseUrl = "https://api.channable.com/v1/companies/" . config('channable.company-id');
    }

    public function authenticatedRequest(
        string $method, 
        string $endpoint, 
        array $parameters = [], 
        array $headers = []
    ): Response
    {
        $headers['Authorization'] = "Bearer {$this->token}";

        switch ($method) {
            case 'GET':
                return $this->get($endpoint, $parameters, $headers);
                break;
            case 'GET':
                return $this->post($endpoint, $parameters, $headers);
                break;
        }
    }

    public function get(
        string $url,
        array $query = [],
        array $headers = []
    ): Response {
        $client = new GuzzleClient();
        return $client->request('GET', $this->baseUrl . $url, [
            'query'   => $query,
            'headers' => $headers,
        ]);
    }

    public function post(
        string $url,
        array $parameters = [],
        array $headers = []
    ): Response {
        $client = new GuzzleClient();
        return $client->request('POST', $this->baseUrl . $url, [
            'body'    => json_encode($parameters),
            'headers' => $headers,
        ]);
    }
}