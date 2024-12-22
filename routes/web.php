<?php

use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('qui-sommes-nous', 'pages.whoWeAre')->name('whoWeAre');
Route::view('mot-de-la-secretaire-executive', 'pages.secretaryWords')->name('secretaryWords');
Route::view('textes-reglementaires', 'pages.decrees')->name('decrees');
Route::view('toutes-les-actualites', 'pages.news')->name('news');
Route::view('nous-contacter', 'pages.contact')->name('contacts');
Route::prefix('devenir-expert')->group(function() {
	Route::view('/', 'pages.becomeExpert.index')->name('becomeExpert.index');
	Route::view('conditions', 'pages.becomeExpert.conditions')->name('becomeExpert.conditions');
	Route::view('procedure', 'pages.becomeExpert.procedure')->name('becomeExpert.procedure');
});


Route::middleware(HandleInertiaRequests::class)->group(function() {

	Route::get('panel', function() {
		return inertia()->render('home');
	})->name('panel');

});

Route::view('mail', 'mails.auth.verify');

require __DIR__ . '/auth.php';
