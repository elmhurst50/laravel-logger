<?php
/**
 * Logger service provider to be abled to log in different files
 *
 * @package    App\Providers
 * @author     Romain Laneuville <romain.laneuville@hotmail.fr>
 */

namespace SamJoyce777\LaravelLogger\Providers;

use Illuminate\Support\ServiceProvider;
use SamJoyce777\LaravelLogger\Helper\LogToChannels;

/**
 * Class LogToChannelsServiceProvider
 *
 * @package App\Providers
 */
class LogToChannelsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'laravel-logger');

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/../Http/Routes/routes.php';
        }
    }

    /**
     * Initialize the logger
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('SamJoyce777\LaravelLogger\Helper\LogToChannels', function () {
            return new LogToChannels();
        });
    }
}