<?php

namespace IceBB\Core;

use Illuminate\Support\ServiceProvider;
use IceBB\Models\GroupRepository;
use IceBB\Models\ConfigRepository;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('icebb/core', 'icebb');

        include __DIR__.'/../../start.php';
        include __DIR__.'/../../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('IceBB\Models\GroupRepositoryInterface', function ($app) {
            return new GroupRepository($app['cache']);
        });

        $this->app->bind('IceBB\Models\ConfigRepositoryInterface', function ($app) {
            return new ConfigRepository($app['cache']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
