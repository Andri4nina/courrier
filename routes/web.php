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
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\SmsController;

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


    Route::middleware(['auth','cache.no-cache'])->delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware(['auth','cache.no-cache'])->get('/Menu', [AuthController::class, 'toMenu'])->name('auth.toMenu');

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

    /* route pour courrier */
    Route::middleware(['auth'])->prefix('courrier')->group(function () {
        Route::get("/", [CourrierController::class, "index"])->name('courrier.index');
        Route::post("/create", [CourrierController::class, "create"])->name('courrier.create');
        Route::get("/expedition", [CourrierController::class, "listExpCourrier"])->name('courrier.expediteur');
        Route::get("/reception", [CourrierController::class, "listDestCourrier"])->name('courrier.destinataire');
        Route::get("/archive", [CourrierController::class, "archive"])->name('courrier.archive');
        Route::get("/detail/{id}", [CourrierController::class, "showDetailCourrier"])->name('courrier.detail');
        Route::get('/modification/{id}', [CourrierController::class, 'edit'])->name('courrier.edit');
        Route::post('/', [CourrierController::class, 'update'])->name('courrier.update');
        Route::post('/reception/{idFact}', [CourrierController::class, 'reception'])->name('courrier.reception');
        Route::post('/receptionReturn/{idFact}', [CourrierController::class, 'receptionReturn'])->name('courrier.receptionReturn');
        Route::delete('/{id}', [CourrierController::class, 'destroy'])->name('courrier.destroy');
        Route::get("/archive", [CourrierController::class, "archive"])->name('courrier.archive');
    });



    /* route pour parametre */
    Route::middleware(['auth'])->prefix('parametre')->group(function () {
        Route::get("/{id}", [ParametreController::class, "index"])->name('parametre.index');
        Route::post("/create", [ParametreController::class, "update"])->name('parametre.update');
    });


    /* route pour client */
    Route::middleware(['auth'])->prefix('client')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('client.index');
        Route::get('/modification/{id}', [ClientController::class, 'edit'])->name('client.edit');
        Route::get('/detail/{id}', [ClientController::class, 'details'])->name('client.detail');
        Route::post('/', [ClientController::class, 'update'])->name('client.update');
        Route::delete('/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
    });

    /* Facture */
    Route::middleware(['auth'])->get("/fact/{idFact}", [FactController::class, 'generate'])->name('fact.generate');
    Route::middleware(['auth'])->get("/fact-design", [FactController::class, 'index'])->name('fact.index');


    /* SMS notification */
    Route::middleware(['auth'])->post("/send-sms-notification/{id}", [SmsController::class, 'sendSms'])->name('send-sms-notification');

    /* MAIL */
    Route::middleware(['auth'])->get("/sendMail/{idFact}", [SendEmailController::class, "sendEmail"])->name("send-mail-notification");
    Route::middleware(['auth'])->get("/sendMailReturn/{idFact}", [SendEmailController::class, "sendEmailReturn"])->name("send-mail-notification-return");
    Route::middleware(['auth'])->get("/sendMailRecept/{idFact}", [SendEmailController::class, "sendEmailPackageReceived"])->name("send-mail-notification-recept");
    Route::middleware(['auth'])->get("/sendMailRappel/{idFact}/{status}", [SendEmailController::class, "sendEmailRappel"])->name("send-mail-notification-rappel");


