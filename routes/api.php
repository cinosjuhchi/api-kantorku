<?php

use Illuminate\Http\Request;
use App\Http\Controllers\api\v1\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\User\UserController;


Route::get('/get-user', [UserController::class, 'getUser']);