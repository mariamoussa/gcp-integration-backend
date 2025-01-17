<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * This method is used to bind services into the container or register
     * third-party packages and custom logic.
     *
     * @return void
     */
    public function register()
    {
        //
        // You can register bindings or conditionally load services here
    }

    /**
     * Bootstrap any application services.
     *
     * This method is used to execute any logic that needs to be run
     * when your application boots, such as setting defaults or
     * performing setup tasks.
     *
     * @return void
     */
    public function boot()
    {
        // Set default string length for migrations
        Schema::defaultStringLength(191);

        // Force HTTPS in production
        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
