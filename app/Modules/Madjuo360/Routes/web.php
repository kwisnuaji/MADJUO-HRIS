<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Madjuo360\Controllers\FeedbackController;

Route::prefix('360')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('madjuo360.index');
});

