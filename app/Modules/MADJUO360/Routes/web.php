<?php

use Illuminate\Support\Facades\Route;

Route::prefix('madjuo360')->group(function () {
    Route::get('/', [\App\Modules\MADJUO360\Controllers\HomeController::class, 'index']);
});
