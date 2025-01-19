<?php

use App\Http\Controllers\Approval\AddressesController;
use App\Http\Controllers\Approval\ChoiceController;
use App\Http\Controllers\Approval\DegreeController;
use App\Http\Controllers\Approval\IdentificationController;
use App\Http\Controllers\Approval\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DecreeController as GetDecreesController;
use App\Http\Controllers\NewzController;
use App\Http\Controllers\Panel\ArticleController;
use App\Http\Controllers\Panel\DecreeController;
use App\Http\Controllers\Panel\FlashInfoController;
use App\Http\Controllers\Panel\ImageController;
use App\Http\Controllers\Panel\MessageController;
use App\Http\Controllers\Panel\StatementController;
use App\Http\Controllers\Panel\SubscriberController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Facades\Route;

const EXCEPT_METHODS = ['create', 'show', 'edit'];

Route::view('/', 'pages.home')->name('home');
Route::view('qui-sommes-nous', 'pages.who-we-are')->name('whoWeAre');
Route::view('mot-de-la-secretaire-executive', 'pages.secretary-words')->name('secretaryWords');
Route::get('textes-reglementaires', GetDecreesController::class)->name('decrees');
Route::get('actualites', [NewzController::class, 'index'])->name('news.index');
Route::get('actualites/{slug}', [NewzController::class, 'show'])->name('news.show');
Route::view('nous-contacter', 'pages.contact')->name('contacts');
Route::post('envoyer-le-message', ContactController::class)->name('contacts.send');
Route::prefix('devenir-expert')->group(function () {
    Route::view('/', 'pages.becomeExpert.index')->name('becomeExpert.index');
    Route::view('conditions', 'pages.becomeExpert.conditions')->name('becomeExpert.conditions');
    Route::view('procedure', 'pages.becomeExpert.procedure')->name('becomeExpert.procedure');
});

Route::middleware(['auth', 'verified'])->group(function() {

    Route::get('formulaire', IndexController::class)->name('becomeExpert.form');
    Route::post('définir-le-choix', ChoiceController::class)->name('approval.choice');
    Route::prefix('identite')->group(function() {
        Route::post('etape-1', [IdentificationController::class, 'firstStep'])->name('identity.first');
        Route::post('etape-2', [IdentificationController::class, 'secondStep'])->name('identity.second');
        Route::post('etape-3', [IdentificationController::class, 'thirdStep'])->name('identity.third');
        Route::post('etape-4', [IdentificationController::class, 'fourthStep'])->name('identity.fourth');
    });
    Route::post('definir-les-adresses', AddressesController::class)->name('approval.addresses');
    Route::post('definir-les-diplomes', DegreeController::class)->name('approval.degrees');
});

Route::middleware(['auth', 'verified', HandleInertiaRequests::class])->group(function () {

    Route::get('panel', function () {
        return inertia()->render('home');
    })->name('panel');

    Route::resource('articles', ArticleController::class)->except(['show', 'update']);
    Route::post('articles/{article}', [ArticleController::class, 'update']);
    Route::resource('utilisateurs', UserController::class)->except(EXCEPT_METHODS);
    Route::resource('decrets', DecreeController::class)->except([ ...EXCEPT_METHODS, 'update']);
    Route::post('decrets/{decret}', [DecreeController::class, 'update']);
    Route::resource('messages', MessageController::class)->except([ ...EXCEPT_METHODS, 'store']);
    Route::resource('infos', FlashInfoController::class)->except(EXCEPT_METHODS);
    Route::resource('communiques', StatementController::class)->except('show');
    Route::resource('abonnes_newsletter', SubscriberController::class)->only(['index', 'destroy']);

    Route::prefix('article/images')->group(function () {
        Route::post('upload', [ImageController::class, 'store']);
        Route::post('delete', [ImageController::class, 'delete']);
    });

});

require __DIR__ . '/auth.php';
