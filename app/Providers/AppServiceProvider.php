<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        // Share user data with all views
        View::composer('*', function ($view) {
            $view->with('currentUser', Auth::user());
            $view->with('currentBusinessUser', Auth::guard('business')->user());
            $view->with('isRegularUser', Auth::check());
            $view->with('isBusinessUser', Auth::guard('business')->check());
        });
    }
}
