<?php

use App\Http\Controllers\CaptchaController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

include 'errors.php';

Route::get('/generate-captcha', [CaptchaController::class, 'generateCaptcha'])->name('generate-captcha');
Route::post('/validate-captcha', [CaptchaController::class, 'validateCaptcha']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function () {
    Auth::user()->sendEmailVerificationNotification();
    return back()->with('message', 'Ссылка на верификацию успешно отправлена');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
