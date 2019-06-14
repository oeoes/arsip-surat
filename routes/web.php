<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('arsip-surat')->group(function() {
    Route::get('/', 'LetterController@home')->name('home');
    Route::post('/record-surat', 'LetterController@recordSurat')->name('record.surat');
    Route::get('/surat-masuk', 'LetterController@suratMasuk')->name('surat.masuk');
    Route::get('/surat-keluar', 'LetterController@suratKeluar')->name('surat.keluar');
    Route::post('/update-surat/{id}', 'LetterController@updateSurat')->name('update.surat');
    Route::get('/delete-surat/{id}', 'LetterController@deleteSurat')->name('delete.surat');
    Route::get('/favorite/keep/{id}', 'LetterController@addFavorite')->name('add.favorite');
    Route::get('/favorite', 'LetterController@favoriteList')->name('favorite');
});