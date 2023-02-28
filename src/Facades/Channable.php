<?php

namespace DenizTezcan\Channable\Facades;

use Illuminate\Support\Facades\Facade;

class Channable extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'channable';
    }
}
