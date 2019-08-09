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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('/')->middleware('auth');
Route::get('/pacientes', 'PacientesController@index')->name('pacientes')->middleware('auth');
Route::get('/pacientes/cadastro', 'PacientesController@editaPaciente')->name('pacientesCadastro')->middleware('auth');
Route::get('/pacientes/paginacao', 'HomeController@getUsers')->name('pacientespaginacao');
 

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
