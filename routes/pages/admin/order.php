<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::middleware(['admin'])->prefix('admin')->group(function () {
  Route::get('/orders', [OrderController::class, 'allOrders'])->name('admin.all_orders');
  Route::put('/orders/{orderId}/cancel', [OrderController::class, 'cancelOrder'])->name('order.cancel');
});