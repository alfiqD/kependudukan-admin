<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaKeluargaController;

// Route::get('/', function () {
//     return view('welcome');
// });

// //route halaman dashboard
// Route::get('/dashboard', [AdminController::class, 'index']);

//route form login
Route::get('/auth', [AuthController::class, 'index']);
// //route form respon login
Route::post('/auth/login', [AuthController::class, 'login']);

// //route admin template
// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

// Route::get('/', function () {
//     return view('login'); // tampilkan halaman login
// });

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

// Route::get('/dashboard', [DashboardController::class, 'index'])-> name ('dashboard');

// Route utama (http://127.0.0.1:8000)
Route::get('/', function () {
    return redirect('/auth'); //login dulu baru dashboard kalau mau dashboard dulu ganti /admin
});

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/auth/register', [AuthController::class, 'register']);


// Route dashboard admin
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

// // Route untuk dashboard admin (http://127.0.0.1:8000/admin)
// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });


    // cukup tulis 'keluarga_kk', jangan /admin/keluarga_kk
    Route::resource('keluarga_kk', KeluargaKKController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('users', UserController::class);
    Route::resource('anggota_keluarga', AnggotaKeluargaController::class);

});









