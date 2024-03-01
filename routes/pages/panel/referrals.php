<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkdb'])->group(function () {
    Route::get('/referrals', function () {
        return view('panel.referrals');
    })->name('referrals');
});
