<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResendVerificationController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\VerifyController;

Route::middleware('guest')->group(function() {

	Route::get('se-connecter', [SessionController::class, 'index'])->name('login.view');
	Route::post('connexion', [SessionController::class, 'login'])->name('login.attempt');
	Route::view('creer-un-compte', 'pages.auth.register')->name('register.view');
	Route::post('inscription', RegisterController::class)->name('register.attempt');
	Route::post('verifiez-mon-mail/{id}/{hash}', VerifyController::class)
	->middleware('signed')->name('verification.verify');

	Route::view('verifiez-votre-email', 'pages.auth.verify')->name('verification.notice');
	Route::post('renvoyez-la-verification', ResendVerificationController::class)
	->middleware('throttle:6,1')->name('verification.resend');

});

Route::middleware('auth')->group(function() {

	//

});

Route::middleware(['auth', 'verified'])->group(function() {
	//
});
