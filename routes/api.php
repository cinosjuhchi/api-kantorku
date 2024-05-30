<?php

use App\Http\Controllers\api\v1\Auth\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\User\UserController;


Route::group([
    'prefix' => 'v1'
], function () {
    
    Route::get('/get-user', [UserController::class, 'getUser']);
    Route::group([
        'prefix' => 'auth'
    ], function() {
        Route::post('/login', [AuthController::class, 'login']);        
    });
}
);