<?php

namespace DenizTezcan\Channable\Entities;

use DenizTezcan\Channable\Http\Client;

class Entity
{
    protected $client = null;
    protected $projectId = null;

    public function __construct(Client $client, string $projectId)
    {
        $this->client = $client;
        $this->projectId = $projectId;
    }

    public function prepareUrl(string $url): string
    {
        return "/projects/".$this->projectId.$url;
    }
}
