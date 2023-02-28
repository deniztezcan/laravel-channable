<?php

namespace DenizTezcan\Channable\Models;

class Order extends Model
{
    public $order;
    public $events;

    public function validate(): void
    {
        $this->assertType($this->order, 'object');
        $this->assertType($this->events, 'array');
    }
}