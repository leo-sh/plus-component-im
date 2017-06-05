<?php

namespace Zhiyi\Component\ZhiyiPlus\PlusComponentIm;

use Illuminate\Support\ServiceProvider;

class ImServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes.
        $this->loadRoutesFrom(
            dirname(__DIR__).'/routes.php'
        );

        // Load views.
        $this->loadViewsFrom(dirname(__DIR__).'/views/', 'component-im');

        // publish asstes
        $this->publishes([
            dirname(__DIR__).'/asstes' => $this->app->publicPath().'/zhiyi/im',
        ], 'public');
    }
}
