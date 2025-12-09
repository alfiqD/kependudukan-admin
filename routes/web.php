<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\DeveloperProfileController;
// Route::get('/', function () {
//     return view('welcome');
// });

// //route halaman dashboard
// Route::get('/dashboard', [AdminController::class, 'index']);



//route form login
Route::get('/auth', [AuthController::class, 'index']);
// //route form respon login
Route::post('/auth/login', [AuthController::class, 'login']);



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
    Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);
    Route::delete('/media/delete/{media_id}', [PeristiwaKelahiranController::class, 'deleteMedia'])
        ->name('media.delete');

});

// Route::get('/admin', function () {
//     return view('dashboard');
// })->middleware('checkislogin');

// ===========================
// ADMIN AREA (HARUS LOGIN)
// ===========================
Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware('checkrole:admin,petugas,warga')
    ->name('admin.dashboard');


Route::prefix('admin')->group(function () {

    // =======================
    // USERS (ADMIN ONLY)
    // =======================
    Route::resource('users', UserController::class)
        ->middleware('checkrole:admin');


    // =======================
    // DATA YANG BISA DIAKSES
    // admin, petugas, warga
    // =======================
    Route::middleware('checkrole:admin,petugas,warga')->group(function () {

        Route::resource('keluarga_kk', KeluargaKKController::class);
        Route::resource('warga', WargaController::class);
        Route::resource('anggota_keluarga', AnggotaKeluargaController::class);
        Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);
    });

});


    Route::resource('profile', App\Http\Controllers\ProfileController::class);
    Route::get('/developer-profile', [DeveloperProfileController::class, 'developerProfile'])
    ->name('profile.pengembang');
