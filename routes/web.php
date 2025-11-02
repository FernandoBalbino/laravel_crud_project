<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
})->name('home');
Route::prefix('login')->group(function(){
    Route::post('/', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
// --- IGNORE ---
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::post('/register', [UserController::class, 'register'])->name('user.register');


Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::put('/update', [UserController::class, 'update'])->name('user.update');
    Route::patch('/password', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::patch('/photo', [UserController::class, 'updatePhoto'])->name('user.update.photo');
});
