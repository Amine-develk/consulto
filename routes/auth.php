<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\consultController;

Route::middleware('alreadyLoggedIn')->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/consultlogin', [consultController::class, 'consultlogin'])->name('auth.consultlogin');
    Route::get('/consultregister', [consultController::class, 'consultregister'])->name('auth.consultregister');
});

Route::post('/consultlogin', [consultController::class, 'consultcreate'])->name('auth.consultcreate');
Route::post('/consultregister', [consultController::class, 'consultstore'])->name('auth.consultstore');

Route::post('/login', [AuthController::class, 'create'])->name('auth.create');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

?>