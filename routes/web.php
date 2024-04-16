<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PosteController;
use Illuminate\Support\Facades\Route;

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
Route::get('/Menu', [AuthController::class, 'doLogin'])->name('auth.dologin');
Route::get('/Menu', [AuthController::class, 'toMenu'])->name('auth.toMenu');


/* route pour postes */
Route::prefix('poste')->group(function () {
    Route::get('/', [PosteController::class, 'index'])->name('poste.index');
    Route::get('/creation', [PosteController::class, 'create'])->name('poste.create');
    Route::get('/mod{id}fication', [PosteController::class, 'edit'])->name('poste.edit');
    Route::post('/store', [PosteController::class, 'store'])->name('poste.store');
    Route::post('/', [PosteController::class, 'update'])->name('poste.update');
    Route::delete('/{id}', [PosteController::class, 'destroy'])->name('poste.destroy');
});
