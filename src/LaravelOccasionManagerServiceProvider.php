<?php

namespace Skoellen\LaravelOccasionManager;

use Illuminate\Support\ServiceProvider;

class LaravelOccasionManagerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/create_occasion_manager_tables.php.stub' =>
            database_path('migrations/' . date('Y_m_d_His', time()) . '_create_occasion_manager_tables.php')
        ], 'migrations');
    }

    public function register()
    {
        $this->app->bind('occasion-manager', function() {
            return new OccasionManager;
        });
    }
}
