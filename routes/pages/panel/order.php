<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkdb'])->group(function () {
  Route::get('/my-orders', [OrderController::class, 'userOrders'])->name('my.orders');
  Route::get('/order', [OrderController::class, 'create'])->name('order.create');
  Route::post('/order/create', [OrderController::class, 'store'])->name('order.store');
});