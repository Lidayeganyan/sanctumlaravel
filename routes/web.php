<?php
use App\Http\Controllers\User\RegistrationController;
use App\Http\Controllers\User\AdminController;

use Illuminate\Support\Facades\Route;

// Route::get('/register', [RegistrationController::class, 'showForm'])->name('user.register.form');
// Route::post('/register', [RegistrationController::class, 'store'])->name('user.register.store');
// Route::resource('/User',RegistrationController::class);


// Route::get('/user', [RegistrationController::class, 'showForm'])->name('user.form');
Route::get('/registration', [RegistrationController::class, 'showForm'])->name('registration.form');

// Route::post('/user', [RegistrationController::class, 'store'])->name('user.store');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('/accout', [AdminController::class, 'index'])->name('account');

// Route::post('/logout', function() {
//     Auth::logout();
//     return redirect('/user');
// })->name('logout');