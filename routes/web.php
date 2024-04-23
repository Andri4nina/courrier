<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\FactController;
use App\Http\Controllers\KimController;
use App\Http\Controllers\ParametreController;
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


Route::get('/Menu', [AuthController::class, 'toMenu'])->name('auth.toMenu')->middleware('auth');

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
Route::prefix('courrier')->middleware('auth')->group(function () {
    Route::get("/", [CourrierController::class, "index"])->name('courrier.index');
    Route::post("/create", [CourrierController::class, "create"])->name('courrier.create');
    Route::get("/expedition", [CourrierController::class, "showExpCourrier"])->name('courrier.expediteur');
    Route::get("/reception", [CourrierController::class, "showDestCourrier"])->name('courrier.destinataire');
    Route::get("/archive", [CourrierController::class, "archive"])->name('courrier.archive');
});



/* route pour parametre */
Route::prefix('parametre')->middleware('auth')->group(function () {
    Route::get("/{id}", [ParametreController::class, "index"])->name('parametre.index');
    Route::post("/create", [ParametreController::class, "update"])->name('parametre.update');
});


/* route pour client */
Route::prefix('client')->middleware('auth')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/modification/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::get('/detail/{id}', [ClientController::class, 'details'])->name('client.detail');
    Route::post('/', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
});

/* Test */
Route::get("/fact", [FactController::class, 'generate'])->name('fact.generate');
