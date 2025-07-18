<?php

namespace HeaderHarmony;

use Illuminate\Support\ServiceProvider;

class HeaderHarmonyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/header-harmony.php', 'header-harmony');

        $this->app->singleton(HeaderHarmony::class, function () {
            return new HeaderHarmony();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/header-harmony.php' => config_path('header-harmony.php'),
        ], 'header-harmony-config');
    }
}
