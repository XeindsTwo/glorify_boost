<?php

use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->group(function () {
  Route::get('/admin/transactions', [BalanceController::class, 'getAllTransactions'])->name('transactions');
  Route::put('/admin/transactions/{transactionId}/cancel', [BalanceController::class, 'cancelPayment'])->name('transactions.cancel');
});
