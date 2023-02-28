<?php

namespace DenizTezcan\Channable;

use DenizTezcan\Channable\Entities\Order;
use DenizTezcan\Channable\Http\Client;

class Channable
{
    protected Client $client;

    public function order(string $projectId): Order
    {
        return new Order($this->client, $projectId);
    }
}
