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
        $this->app->bind(
            'App\Service\Auth\AuthServiceInterface',
            'App\Service\Auth\AuthService',
        );

        $this->app->bind(
            'App\Service\User\UserServiceInterface',
            'App\Service\User\UserService',
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
