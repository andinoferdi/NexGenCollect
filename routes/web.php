<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\SettingMenuController;
use App\Http\Controllers\SettingSubmenuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ApplicationSettingController;
use App\Http\Controllers\NftController;
use App\Http\Controllers\UserVerifikasiController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'indexregister'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('')->group(function () {
    Route::get('/', [UserpageController::class, 'index'])->name('userpage');
    Route::get('/account/setting', [UserpageController::class, 'accountsettinguser'])->name('account_setting_user');
    Route::put('/account/update/{user}', [UserpageController::class, 'updateprofileuser'])->name('updateprofile_user');
    Route::get('verifikasi', [UserVerifikasiController::class, 'indexUser'])->name('verifikasi.indexuser');
    Route::post('verifikasi', [UserVerifikasiController::class, 'store'])->name('verifikasi.store');
});

Route::prefix('dashboard')->middleware('auth.custom')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('submenu', SubmenuController::class);
    Route::resource('setting_menus', SettingMenuController::class);
    Route::resource('setting_submenus', SettingSubmenuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::get('/application_settings', [ApplicationSettingController::class, 'index'])->name('application_settings');
    Route::put('/application_settings/update_all', [ApplicationSettingController::class, 'updateAll'])->name('application_settings.update_all');
    Route::get('/account/setting', [DashboardController::class, 'accountsetting'])->name('account_setting');
    Route::put('/dashboard/account/update/{user}', [DashboardController::class, 'updateprofile'])->name('updateprofile');
    Route::resource('nft', NftController::class);
    Route::get('/nfts/{nft}/detail', [NftController::class, 'show'])->name('nft.detail');
 Route::get('verifikasi', [UserVerifikasiController::class, 'indexAdmin'])->name('verifikasi.index');
    Route::get('verifikasi/{userVerifikasi}', [UserVerifikasiController::class, 'show'])->name('verifikasi.show');
    Route::post('verifikasi/{userVerifikasi}/verify', [UserVerifikasiController::class, 'verify'])->name('verifikasi.verify');
    Route::post('verifikasi/{userVerifikasi}/reject', [UserVerifikasiController::class, 'reject'])->name('verifikasi.reject');
});
