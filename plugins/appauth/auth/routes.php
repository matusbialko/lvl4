<?php

use Illuminate\Support\Facades\Route;
use AppAuth\Auth\Http\Controllers\AuthController;

Route::group(['prefix' => 'api/auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

?>