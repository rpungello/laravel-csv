<?php

namespace Rpungello\LaravelCsv\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rpungello\LaravelCsv\LaravelCsv
 */
class LaravelCsv extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Rpungello\LaravelCsv\LaravelCsv::class;
    }
}
