<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [FrontController::class, 'home'])->name('home');

Route::prefix('front')->name('front.')->group(function () {
    // Route::get('/login', [AuthController::class, 'login'])->name('login');
    // Route::post('/login', [LoginController::class, 'login'])->name('loginPost');
    // Route::get('/register', [AuthController::class, 'register'])->name('register');
    // Route::post('/register', [AuthController::class, 'store_register'])->name('store');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/about', [FrontController::class, 'about'])->name('about');
    Route::get('/index', [BackController::class, 'index'])->name('index');
    Route::get('/reservation', [FrontController::class, 'reservation'])->name('reservation');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
});
