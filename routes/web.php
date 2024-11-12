<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\SettingMenuController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'indexlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'indexregister'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [UserpageController::class, 'index'])->name('userpage');

Route::prefix('dashboard')->middleware('auth.custom')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('submenu', SubmenuController::class);
    Route::resource('setting_menus', SettingMenuController::class);
});

