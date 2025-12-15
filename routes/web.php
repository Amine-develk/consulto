<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AlreadyLoggedIn;
use App\Http\Controllers\ConsultantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [ConsultantController::class, 'welcome'])->name('welcome');


Route::post('/send-consultation-request', [ConsultantController::class,'sendRequest'])->name('send.consultation.request');

Route::post('/accept.consultation.request', [ConsultantController::class,'acceptRequest'])->name('accept.consultation.request');


Route::get('home', [ConsultantController::class, 'home'])->name('home')->middleware(AlreadyLoggedIn::class);
Route::get('consulthome', [ConsultantController::class, 'consulthome'])->name('consulthome')->middleware(AlreadyLoggedIn::class);
Route::get('profile', [ConsultantController::class, 'profile'])->name('profile')->middleware(AlreadyLoggedIn::class);
route::get('espace', [ConsultantController::class, 'espace'])->name('espace')->middleware(AlreadyLoggedIn::class);



require __DIR__ . '/auth.php';