<?php

namespace ArtisanBlade\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ArtisanBlade\ArtisanBlade
 */
class ArtisanBlade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'artisan-blade';
    }
}
