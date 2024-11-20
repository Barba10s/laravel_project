<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post("/register", [UserController::class, 'register']);

Route::middleware(['check.blocked'])->group(function () {
    Route::get('/user', [UserController::class,'getUser']);
    Route::put('/user', [UserController::class,'updateUser']);
    Route::delete('/user', [UserController::class,'deleteUser']);
});



Route::get('/', function()
{
    return view('welcome');
});


