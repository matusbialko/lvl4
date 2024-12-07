<?php

use Illuminate\Support\Facades\Route;
use AppAuth\Google\Http\Controllers\GoogleController;

Route::group(['prefix' => 'auth/google'], function () {
    Route::get('redirect', [GoogleController::class, 'redirect']);
    Route::get('callback', [GoogleController::class, 'callback']);
});

?>