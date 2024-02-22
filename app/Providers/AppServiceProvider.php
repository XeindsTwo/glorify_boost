<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
           if (Auth::check()) {
               $balance = Auth::user()->balance;
               $view->with('balance', $balance);
           }
        });
    }
}
