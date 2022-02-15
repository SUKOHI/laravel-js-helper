<?php

namespace Sukohi\JsHelper;

use Illuminate\Support\ServiceProvider;

class JsHelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ .'/config/js_helper.php' => config_path('js_helper.php'),
        ], 'laravel-js-helper-config');
        $this->loadViewsFrom(__DIR__ .'/resources/views', 'js-helper');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ .'/config/js_helper.php', 'js_helper'
        );
    }
}
