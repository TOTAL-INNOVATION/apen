<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('a-propos', 'pages.about')->name('about');
Route::view('qui-sommes-nous', 'pages.whoWeAre')->name('whoWeAre');
Route::view('mot-de-la-secretaire-executive', 'pages.secretaryWords')->name('secretaryWords');
Route::view('textes-reglementaires', 'pages.decrees')->name('decrees');
Route::view('toutes-les-actualites', 'pages.news')->name('news');
