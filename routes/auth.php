<?php

use App\Http\Controllers\Auth\Password\NewPasswordController;
use App\Http\Controllers\Auth\Password\ResendResetLinkController;
use App\Http\Controllers\Auth\Password\ResetController;
use App\Http\Controllers\Auth\Password\SendResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResendVerificationController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\VerifyController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {

	Route::get('se-connecter', [SessionController::class, 'index'])->name('login.view');
	Route::post('connexion', [SessionController::class, 'login'])->name('login.attempt');

	Route::view('creer-un-compte', 'pages.auth.register')->name('register.view');
	Route::post('inscription', RegisterController::class)->name('register.attempt');

	Route::view('mot-de-passe-oublie', 'pages.auth.password.forgot')->name('password.forgot');
	Route::post('envoi-du-lien', SendResetLinkController::class)->name('password.sendLink');

	Route::view('lien-envoye', 'pages.auth.password.resetLinkSent')->name('password.linkSent');
	Route::post('renvoyer-le-lien', ResendResetLinkController::class)
	->middleware('throttle:6,1')->name('password.resendResetLink');
	
	Route::get('nouveau-mot-de-passe/{token}', ResetController::class)->name('password.reset');
	Route::post('definir-le-mot-de-passe', NewPasswordController::class)->name('password.new');
});

Route::middleware('auth')->group(function() {
	Route::post('deconnexion', [SessionController::class, 'logout'])->name('logout');
	Route::view('verifiez-votre-email', 'pages.auth.verify')->name('verification.notice');
	Route::post('renvoyez-la-verification', ResendVerificationController::class)
	->middleware('throttle:6,1')->name('verification.resend');
});
Route::get('verifiez-mon-mail/{id}/{hash}', VerifyController::class)
->middleware('signed')->name('verification.verify');

Route::middleware(['auth', 'verified'])->group(function() {
	//
});
