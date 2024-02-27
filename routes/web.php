<?php

use App\Http\Controllers\CaptchaController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

include 'pages/errors.php';

Route::get('/generate-captcha', [CaptchaController::class, 'generateCaptcha'])->name('generate-captcha');
Route::post('/validate-captcha', [CaptchaController::class, 'validateCaptcha']);
