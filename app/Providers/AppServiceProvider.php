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
                $user = Auth::user();
                $userBalance = $user->balance;
                $balance = $userBalance->getBalance();
                $view->with('balance', $balance);
            }
        });

        setlocale(LC_TIME, 'ru_RU.UTF-8');
    }
}
