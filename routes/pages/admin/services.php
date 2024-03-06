<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin'])->prefix('admin')->group(function () {
  Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
  Route::post('/services', [ServiceController::class, 'create'])->name('admin.services.create');
  Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
  Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
});