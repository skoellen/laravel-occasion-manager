<?php

namespace Skoellen\LaravelOccasionManager\Facades;

use Illuminate\Support\Facades\Facade;

class OccasionManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'occasion-manager';
    }
}
