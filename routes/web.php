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

Route::get('/', 'HomeController@inicio');


Auth::routes();

//Página inicial do Auth
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//Rotas de Marcas
Route::resource('marca', 'MarcaController')->except('show','destroy');
Route::get('marca/destroy/{id}',['as' => 'marca.destroy', 'uses' => 'MarcaController@destroy']);

//Rotas de TipoAutomovel
Route::resource('tipoautomovel', 'TipoAutomovelController')->except('show','destroy');
Route::get('tipoautomovel/destroy/{id}',['as' => 'tipoautomovel.destroy', 'uses' => 'TipoAutomovelController@destroy']);

//Rotas de Automovel
Route::resource('automovel', 'AutomovelController')->except('destroy');
Route::get('automovel/destroy/{id}',['as' => 'automovel.destroy', 'uses' => 'AutomovelController@destroy']);

