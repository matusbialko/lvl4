<?php

use Illuminate\Support\Facades\Route;
use AppAuth\Google\Http\Controllers\GoogleController;

Route::group(['prefix' => 'auth/google', 'middleware' => 'web'], function () {
    Route::get('redirect', [GoogleController::class, 'redirectToGoogle']);
    Route::get('callback', [GoogleController::class, 'handleGoogleCallback']);
});

?>