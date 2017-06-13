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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

//Livre Route
Route::resource('livre','LivreController');
Route::get('livre/exemplaire/create/{id}','LivreController@createCopy')->name('livre.createCopy');
Route::post('livre/exemplaire/store','LivreController@storeCopy')->name('livre.storeCopy');
Route::get('livre/exemplaire/edit/{id}','LivreController@editCopy')->name('livre.editCopy');
Route::put('livre/exemplaire/{id}','LivreController@updateCopy')->name('livre.updateCopy');
Route::delete('livre/exemplaire/{id}','LivreController@destroyCopy')->name('livre.deleteCopy');



Route::resource('these','TheseController');
Route::resource('publication','PublicationController');
Route::resource('journal','JournalController');
Route::resource('enseignant','EnseignantController');
Route::resource('carte','CarteController');
Route::resource('demande','DemandeController');
Route::resource('emprunt','EmpruntController');





Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
