<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\RegistrationController;
use Illuminate\Support\Facades\Auth;

// Route::get('/registration', [RegistrationController::class, 'showForm'])->name('registration.form');

Route::get('/', [RegistrationController::class, 'showForm'])->name('registration.form');
Route::get('/registration', [RegistrationController::class, 'showForm']);
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('user.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('user.update');
    Route::get('/account', [AdminController::class, 'index'])->name('account');
});
