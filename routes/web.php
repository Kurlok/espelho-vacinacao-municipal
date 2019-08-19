<?php

use App\Paciente;

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
Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::middleware(['auth', 'Administrador'])->group(function () {
    Route::get('/vacinas', 'VacinasController@index')->name('vacinas');
    Route::get('/vacinas/cadastro', 'VacinasController@telaCadastroVacina')->name('telaCadastroVacina');
    Route::get('/vacinas/cadastro/{id}', 'VacinasController@getVacina')->name('vacinaId');
    Route::any('/vacinas/busca', 'VacinasController@buscaVacina')->name('vacinasBusca');
    Route::post('/vacinas/cadastro/novo', 'VacinasController@cadastrarVacina')->name('cadastrarVacina');
    Route::post('/vacinas/cadastro/alterar/{id}', 'VacinasController@alterarVacina')->name('alterarVacina');
    Route::post('/vacinas/delete/{id}', 'VacinasController@deletarVacina')->name('deletarVacina');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pacientes', 'PacientesController@index')->name('pacientes');
    Route::get('/pacientes/cadastro', 'PacientesController@telaCadastroPaciente')->name('telaCadastroPaciente');
    Route::get('/pacientes/cadastro/{id}', 'PacientesController@getPaciente')->name('pacienteId');
    Route::any('/pacientes/busca', 'PacientesController@buscaPaciente')->name('pacientesBusca');
    Route::post('/pacientes/cadastro/novo', 'PacientesController@cadastrarPaciente')->name('cadastrarPaciente');
    Route::post('/pacientes/cadastro/alterar/{id}', 'PacientesController@alterarPaciente')->name('alterarPaciente');
    Route::post('/pacientes/delete/{id}', 'PacientesController@deletarPaciente')->name('deletarPaciente');
});




