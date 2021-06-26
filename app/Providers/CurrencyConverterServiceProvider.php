<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CurrencyConverterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Contracts\V1\CurrencyConverterContract::class,
            \App\Services\V1\CurrencyConverterService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
