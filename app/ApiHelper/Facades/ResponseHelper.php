<?php

namespace App\ApiHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \App\ApiHelper\ResponseHelper
 */
class ResponseHelper extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'responseHelper';
    }
}
