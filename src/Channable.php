<?php

namespace DenizTezcan\Channable;

use DenizTezcan\Channable\Entities\Order;
use DenizTezcan\Channable\Http\Client;

class Channable
{
    public function __construct()
    {
        $this->client = new Client();
    }

    public function order(string $projectId): Order
    {
        return new Order($this->client, $projectId);
    }
}
