<?php

namespace DenizTezcan\Channable;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ChannableServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/channable.php' => config_path('channable.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('channable', function () {
            return new Channable();
        });
    }

    public function provides()
    {
        return ['channable'];
    }
}
