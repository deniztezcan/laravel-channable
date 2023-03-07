<?php

namespace DenizTezcan\Channable\Models;

class Event extends Model
{
    public $status;
    public $message;
    public $response;
    public $id;
    public $data;

    public function validate(): void
    {
        $this->assertType($this->status, 'string');
    }
}