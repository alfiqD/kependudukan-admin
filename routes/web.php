<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

//route halaman dashboard
Route::get('/dashboard', [AdminController::class, 'index']);

//route form login
Route::get('/auth', [AuthController::class, 'index']);

//route form respon login
Route::post('/auth/login', [AuthController::class, 'login']);

