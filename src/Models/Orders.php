<?php

namespace DenizTezcan\Channable\Models;

class Orders extends Model
{
    public $orders;
    public $total;
    public $error_count;

    public function validate(): void
    {
        $this->assertType($this->orders, 'array');
        $this->assertType($this->total, 'integer');
        $this->assertType($this->error_count, 'integer');
    }
}