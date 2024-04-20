<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PosteController;

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
Route::get('/', [AuthController::class, 'login'])->name('login.login');
Route::post('/Menu', [AuthController::class, 'doLogin'])->name('auth.dologin');
Route::get('/Menu', [AuthController::class, 'toMenu'])->name('auth.toMenu');


/* route pour postes */
Route::middleware(['auth'])->prefix('poste')->group(function () {
    Route::get('/', [PosteController::class, 'index'])->name('poste.index');
    Route::get('/creation', [PosteController::class, 'create'])->name('poste.create');
    Route::get('/modification/{id}', [PosteController::class, 'edit'])->name('poste.edit');
    Route::post('/store', [PosteController::class, 'store'])->name('poste.store');
    Route::post('/', [PosteController::class, 'update'])->name('poste.update');
    Route::delete('/{id}', [PosteController::class, 'destroy'])->name('poste.destroy');
});

/* route pour user */
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/creation', [UserController::class, 'create'])->name('user.create');
    Route::get('/modification/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});


