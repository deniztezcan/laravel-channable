<?php

namespace DenizTezcan\Channable\Models;

class Orders extends Model
{
    public $orders;

    public function validate(): void
    {
        $this->assertType($this->orders, 'array');
    }
}