<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('includes._dashboard-menu', function ($view)
        {
            $view->with('user', \Auth::user());
        });
        view()->composer('pages.profile', function ($view)
        {
            $view->with('user', \Auth::user());
        });
    }
}
