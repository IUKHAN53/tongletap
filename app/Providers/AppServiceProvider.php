<?php

namespace App\Providers;

use App\Socialite\ZoomProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Laravel\Socialite\Facades\Socialite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Socialite::extend('zoom', function ($app) {
            $config = $app['config']['services.zoom'];
            return Socialite::buildProvider(ZoomProvider::class, $config);
        });
    }
}
