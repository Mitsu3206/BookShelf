<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\RakutenAPIClasses\RakutenAPIService;

class RakutenAPIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        // app()->singleton('App\RakutenAPIClasses\RakutenAPIService', function($app){
        //     $service = new RakutenAPIService();
        //     return $service;
        // });
        app()->singleton('App\RakutenAPIClasses\RakutenAPIServiceInterface',
                    'App\RakutenAPIClasses\RakutenAPIService');
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
