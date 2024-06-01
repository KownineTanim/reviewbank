<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webhook as _;

Route::prefix('google')->group(function() {
    Route::post('/signin', [_\GoogleController::class, 'signin']);
});
