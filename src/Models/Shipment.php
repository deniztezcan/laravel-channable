<?php

namespace DenizTezcan\Channable\Models;

class Shipment extends Model
{
    public $status;

    public function validate(): void
    {
        $this->assertType($this->status, 'string');
    }
}