<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Vonage\Client::class, function ($app) {
            $basic  = new \Vonage\Client\Credentials\Basic(
                env('VONAGE_API_KEY'),
                env('VONAGE_API_SECRET')
            );

            return new \Vonage\Client($basic);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        return [\Vonage\Client::class];
    }
}
