<?php

namespace App\Providers;

use App\Services\Api\Client;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('HttpClient', function($app) {
            return new HttpClient();
        });

        $this->app->bind('App\Services\Api\Client', function ($app) {
            return new Client($app->make('HttpClient'));
        });
    }
}
