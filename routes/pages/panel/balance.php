<?php


use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkdb'])->group(function () {
    Route::get('/balance', [BalanceController::class, 'show'])->name('balance');

    Route::post('/deposit', [BalanceController::class, 'deposit'])->name('deposit');
});
