<?php

namespace SamJoyce777\LaravelLogger\Facades;

use Illuminate\Support\Facades\Facade;
use SamJoyce777\LaravelLogger\Helper\LogToChannels;

class LoggerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return LogToChannels::class; }
}