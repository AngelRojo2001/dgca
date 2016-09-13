<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'LoginController@index');
Route::post('/', 'LoginController@store');
Route::get('logout', 'LoginController@logout');
Route::resource('caeb', 'CaebController');
Route::resource('funcionario', 'FuncionarioController');
Route::resource('consultor', 'ConsultorController');
Route::resource('registro', 'RegistroController');
Route::get('caebui/{id}', 'CaebUiController@create');
Route::post('caebui', 'CaebUiController@store');
Route::get('caebui/eliminar/{id}', 'CaebUiController@destroy');
Route::get('rai/{id}', 'RaiController@create');
Route::post('rai', 'RaiController@store');
Route::get('rai/editar/{id}', 'RaiController@edit');
Route::put('rai/{id}', 'RaiController@update');
Route::get('rai/eliminar/{id}', 'RaiController@destroy');
Route::get('busqueda/ui', 'BusquedaController@ui');
Route::post('busqueda/ui', 'BusquedaController@uibuscar');
Route::get('busqueda/rl', 'BusquedaController@rl');
Route::post('busqueda/rl', 'BusquedaController@rlbuscar');
Route::get('inicio', 'InicioController@index');

Route::get('pdf', 'PdfController@invoice');