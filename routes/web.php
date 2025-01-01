<?php

use App\Http\Controllers\Panel\ArticleController;
use App\Http\Controllers\Panel\ImageController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Facades\Route;

const EXCEPT_METHODS = ['create', 'show', 'edit'];

Route::view('/', 'pages.home')->name('home');
Route::view('qui-sommes-nous', 'pages.whoWeAre')->name('whoWeAre');
Route::view('mot-de-la-secretaire-executive', 'pages.secretaryWords')->name('secretaryWords');
Route::view('textes-reglementaires', 'pages.decrees')->name('decrees');
Route::view('toutes-les-actualites', 'pages.news')->name('news');
Route::view('nous-contacter', 'pages.contact')->name('contacts');
Route::prefix('devenir-expert')->group(function () {
    Route::view('/', 'pages.becomeExpert.index')->name('becomeExpert.index');
    Route::view('conditions', 'pages.becomeExpert.conditions')->name('becomeExpert.conditions');
    Route::view('procedure', 'pages.becomeExpert.procedure')->name('becomeExpert.procedure');
});

Route::middleware(['auth', 'verified', HandleInertiaRequests::class])->group(function () {

    Route::get('panel', function () {
        return inertia()->render('home');
    })->name('panel');
    Route::resource('articles', ArticleController::class);
    Route::resource('utilisateurs', UserController::class)->except(EXCEPT_METHODS);

    Route::prefix('article/images')->group(function () {
        Route::post('upload', [ImageController::class, 'store']);
        Route::post('delete', [ImageController::class, 'delete']);
    });

});

require __DIR__ . '/auth.php';
