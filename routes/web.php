<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeluargaKKController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\AnggotaKeluargaController;
use App\Http\Controllers\PeristiwaKelahiranController;
use App\Http\Controllers\PeristiwaKematianController;
use App\Http\Controllers\PeristiwaPindahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeveloperProfileController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => redirect('/auth'));
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::get('/auth', [AuthController::class, 'index'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/admin', [DashboardController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin,staff_desa,kepala_desa'])
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'checkrole:admin,staff_desa,kepala_desa'])
    ->group(function () {

    // USERS (ADMIN ONLY)
    Route::resource('users', UserController::class)
        ->middleware('checkrole:admin');

    // DATA UMUM
    Route::resource('keluarga_kk', KeluargaKKController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('anggota_keluarga', AnggotaKeluargaController::class);

    // PERISTIWA
    Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);
    Route::resource('peristiwa_kematian', PeristiwaKematianController::class);
    Route::resource('peristiwa_pindah', PeristiwaPindahController::class);

    // MEDIA
    Route::delete('media/delete/{media_id}',
        [PeristiwaKelahiranController::class, 'deleteMedia']
    )->name('media.delete');

    // PROFILE (LOGIN USER)
    Route::resource('profile', ProfileController::class)
        ->only(['index', 'edit', 'update']);
});


/*
|--------------------------------------------------------------------------
| DEVELOPER PROFILE (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/developer-profile', [DeveloperProfileController::class, 'developerProfile'])
    ->name('profile.pengembang');
