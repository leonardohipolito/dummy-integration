<?php

namespace Facilita\Dummy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Facilita\Dummy\Dummy
 */
class Dummy extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Facilita\Dummy\Dummy::class;
    }
}
