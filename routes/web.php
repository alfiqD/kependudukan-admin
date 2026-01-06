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
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/login-success', fn () => view('pages.auth.success'))
    ->middleware('auth')
    ->name('login.success');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD (SEMUA ROLE)
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

    /*
    |=========================
    | ADMIN ONLY
    |=========================
    */
    Route::middleware('checkrole:admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('warga', WargaController::class);
    });

    /*
    |=========================
    | DATA UMUM (SEMUA ROLE)
    |=========================
    */
    Route::resource('keluarga_kk', KeluargaKKController::class);
    Route::resource('anggota_keluarga', AnggotaKeluargaController::class);

    /*
    |=========================
    | PERISTIWA (SEMUA ROLE)
    |=========================
    */
    Route::resource('peristiwa_kelahiran', PeristiwaKelahiranController::class);
    Route::resource('peristiwa_kematian', PeristiwaKematianController::class);
    Route::resource('peristiwa_pindah', PeristiwaPindahController::class);

    /*
    |=========================
    | MEDIA
    |=========================
    */
    Route::delete('media/delete/{media_id}',
        [PeristiwaKelahiranController::class, 'deleteMedia']
    )->name('media.delete');

    /*
    |=========================
    | PROFILE (LOGIN USER)
    |=========================
    */
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

    Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/bypass-fmi', [DashboardController::class, 'index'])->name('admin.dashboard');
});

 Route::middleware(['auth', 'checkrole:staff_desa'])->group(function () {
    Route::get('/bypass-hmn', [DashboardController::class, 'index'])->name('admin.dashboard');
});
