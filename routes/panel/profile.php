<?php


use Illuminate\Support\Facades\Route;

Route::get('/profile', function () {
    return view('panel.profile');
})->middleware('auth')->name('profile');
