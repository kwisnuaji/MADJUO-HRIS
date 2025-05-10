<?php

use Illuminate\Support\Facades\Route;

// Landing page route
Route::get('/', function () {
    return view('landing');
});

// Register MADJUO360 module routes
require base_path('app/Modules/MADJUO360/Routes/web.php');

Route::get('/madjuo360', function () {
    return view('Modules::MADJUO360.views.madjuo360');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/test-2fa', function() {
    $user = App\Models\User::first();
    $user->generateTwoFactorCode();
    return "2FA Code: " . $user->two_factor_code;
});

Route::middleware(['auth'])->group(function () {
    Route::get('/2fa/verify', [TwoFactorAuthController::class, 'showVerificationForm'])
         ->name('2fa.verify');
         
    Route::post('/2fa/verify', [TwoFactorAuthController::class, 'verify']);
});
