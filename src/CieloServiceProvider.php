<?php

namespace CieloApi\CieloApi;

use Illuminate\Support\ServiceProvider;


class CieloServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $config_path = app()->basePath() . '/config/cielo.php';

        $this->publishes([
            __DIR__.'/config/config.php' => $config_path,
        ]);
    }

    public function register()
    {
        $this->app->bind('cielo', function ($app) {
            return new Cielo(config('cielo.merchant_id'), config('cielo.merchant_key'), config('cielo.environment'));
        });

    }
}