<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
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
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/reservation', [FrontController::class, 'reservation'])->name('reservation');

//auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store_register'])->name('store');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');


Route::middleware(['auth'])->group(function () {

    Route::middleware(['superadmin'])->group(function () {
        Route::prefix('superadmin')->name('superadmin.')->group(function () {
            Route::get('/index', [BackController::class, 'superindex'])->name('index');
            Route::name('user.')->prefix('user')->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('index');
                Route::get('/create', [UserController::class, 'create'])->name('create');
                Route::post('/', [UserController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
                Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');
                Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
            });

            Route::name('service.')->prefix('service')->group(function () {
                Route::get('/', [ServiceController::class, 'index'])->name('index');
                Route::get('/create', [ServiceController::class, 'create'])->name('create');
                Route::post('/', [ServiceController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
                Route::put('/edit/{id}', [ServiceController::class, 'update'])->name('update');
                Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
            });

        });
    });

    Route::middleware(['admin', 'superadmin'])->group(function () {
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/index', [BackController::class, 'adminindex'])->name('index');


        });
    });

    Route::middleware(['user'])->group(function () {
        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/index', [BackController::class, 'index'])->name('index');

            Route::prefix('profile')->name('profile.')->group(function () {
                Route::get('/', [UserController::class, 'profile'])->name('profile');
                Route::post('/', [UserController::class, 'profileStore'])->name('profileStore');
                Route::put('/edit', [UserController::class, 'profileEdit'])->name('profileEdit');
            });

            Route::prefix('permohonan')->name('permohonan.')->group(function () {

            });
        });
    });
});
