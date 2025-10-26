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
        // Configure session cookie lifetime to 30 days
        config(['session.lifetime' => 43200]); // 30 dana u minutama
        
        // Share user data with all views
        View::composer('*', function ($view) {
            try {
                $view->with('currentUser', Auth::user());
                $view->with('currentBusinessUser', Auth::guard('business')->user());
                $view->with('isRegularUser', Auth::check() && !Auth::guard('business')->check());
                $view->with('isBusinessUser', Auth::guard('business')->check());
            } catch (\Exception $e) {
                // Fallback for unauthenticated users
                $view->with('currentUser', null);
                $view->with('currentBusinessUser', null);
                $view->with('isRegularUser', false);
                $view->with('isBusinessUser', false);
            }
        });
    }
}
