<?php

use App\Http\Controllers\Api\v1\ContactController;
use App\Http\Controllers\Api\v1\LoginController;
use Illuminate\Support\Facades\Route;


Route::post('/login', LoginController::class);

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('contacts', ContactController::class);
});
