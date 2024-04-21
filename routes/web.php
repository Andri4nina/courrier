<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\KimController;
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
Route::post('/login', [AuthController::class, 'doLogin'])->name('auth.dologin');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::get('/Menu', [AuthController::class, 'toMenu'])->name('auth.toMenu');

/* route pour postes */
Route::prefix('poste')->middleware('auth')->group(function () {
    Route::get('/', [PosteController::class, 'index'])->name('poste.index');
    Route::get('/creation', [PosteController::class, 'create'])->name('poste.create');
    Route::get('/modification/{id}', [PosteController::class, 'edit'])->name('poste.edit');
    Route::post('/store', [PosteController::class, 'store'])->name('poste.store');
    Route::post('/', [PosteController::class, 'update'])->name('poste.update');
    Route::delete('/{id}', [PosteController::class, 'destroy'])->name('poste.destroy');
});

/* route pour user */
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/creation', [UserController::class, 'create'])->name('user.create');
    Route::get('/modification/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

/* route pour courrier */
Route::prefix('courrier') -> group(function () {
    Route::get("/", [CourrierController::class, "index"]);
    Route::post("/create", [CourrierController::class, "create"]);
});