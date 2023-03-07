<?php

namespace DenizTezcan\Channable\Entities;

use DenizTezcan\Channable\Models\Event;
use DenizTezcan\Channable\Models\Orders;
use DenizTezcan\Channable\Models\Order as OrderModel;
use Throwable;

class Order extends Entity
{
    public function all(): Orders
    {
        try {
            $response = $this->client->authenticatedRequest('GET', $this->prepareUrl('/orders'));
            return Orders::fromResponse((string) $response->getBody());
        } catch (Throwable $e) {
            // silence is golden.
        }
    }
    public function allNotShipped(): Orders
    {
        try {
            $response = $this->client->authenticatedRequest('GET', $this->prepareUrl('/orders?status=not_shipped'), ['status' => 'not_shipped']);
            return Orders::fromResponse((string) $response->getBody());
        } catch (Throwable $e) {
            // silence is golden.
        }
    }

    public function get(int $orderId): OrderModel
    {
        try {
            $response = $this->client->authenticatedRequest('GET', $this->prepareUrl('/orders/'.$orderId));
            return OrderModel::fromResponse((string) $response->getBody());
        } catch (Throwable $e) {
            // silence is golden.
        }
    }

    public function ship(int $orderId, string $tracking, string $transporter, array $items): Event
    {
        try {
            $response = $this->client->authenticatedRequest('POST', $this->prepareUrl('/orders/'.$orderId.'/shipment'),[
                'tracking_code' => $tracking,
                'transporter' => $transporter,
                'order_item_ids' => $items,
            ]);
            return Event::fromResponse((string) $response->getBody());
        } catch (Throwable $e) {
            // silence is golden.
        }
    }

    public function cancel(int $orderId, $items): Event
    {
        try {
            $response = $this->client->authenticatedRequest('POST', $this->prepareUrl('/orders/'.$orderId.'/cancel'),[
                'order_item_ids' => $items,
            ]);
            return Event::fromResponse((string) $response->getBody());
        } catch (Throwable $e) {
            // silence is golden.
        }
    }
}
