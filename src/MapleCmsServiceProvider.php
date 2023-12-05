<?php
namespace Techtree\MaplecmsClient;

use Illuminate\Support\ServiceProvider;

class MapleCmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        if ($this->app->runningInConsole()) {
            // In addition to publishing assets, we also publish the config
            $this->publishes([
                __DIR__.'/../config/maplecms.php' => config_path('maplecms.php'),
            ], 'macplecms-config');
        }

    }
}
