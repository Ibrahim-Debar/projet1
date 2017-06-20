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

Route::resource('carte','CarteController');
Route::get('carte/exemplaire/create/{id}','CarteController@createCopy')->name('carte.createCopy');
Route::post('carte/exemplaire/store','CarteController@storeCopy')->name('carte.storeCopy');
Route::get('carte/exemplaire/edit/{id}','CarteController@editCopy')->name('carte.editCopy');
Route::put('carte/exemplaire/{id}','CarteController@updateCopy')->name('carte.updateCopy');
Route::delete('carte/exemplaire/{id}','CarteController@destroyCopy')->name('carte.deleteCopy');


Route::resource('these','TheseController');
Route::resource('publication','PublicationController');
Route::resource('journal','JournalController');
Route::resource('enseignant','EnseignantController');
Route::resource('demande','DemandeController');


Route::resource('emprunt','EmpruntController');
Route::post('selectType','EmpruntController@selectType');
Route::post('selectTypeExempl','EmpruntController@selectTypeExempl');




Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
