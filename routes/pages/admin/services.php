<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->prefix('admin')->group(function () {
  Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
  Route::post('/services', [ServiceController::class, 'create'])->name('admin.services.create');
  Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
  Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
  Route::get('/services/{service}', [ServiceController::class, 'show'])->name('admin.services.show');

  Route::post('/service-items', [ServiceItemController::class, 'store'])->name('admin.service_items.store');
  Route::delete('/service-items/{serviceItem}', [ServiceItemController::class, 'destroy'])->name('admin.service_items.destroy');
  Route::put('/service-items/{id}', [ServiceItemController::class, 'update'])->name('admin.service_items.update');
});