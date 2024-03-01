<?php


use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'checkdb'])->group(function () {
    Route::get('/profile', function () {
        return view('panel.profile');
    })->name('profile');

    Route::post('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.update-name');
    Route::post('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.update-email');
    Route::post('/profile/update-avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update-avatar');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    Route::post('/check-email-edit-profile', function (Request $request) {
        $email = $request->input('email');
        $userId = Auth::id();
        $user = User::where('email', $email)->where('id', '!=', $userId)->first();
        return response()->json([
            'exists' => !!$user,
        ]);
    });
});
