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
Route::get('/', 'HomeController@index')->name('/')->middleware('auth');

Route::get('/pacientes', 'PacientesController@index')->name('pacientes')->middleware('auth');
Route::get('/pacientes/cadastro', 'PacientesController@telaCadastroPaciente')->name('telaCadastroPaciente')->middleware('auth');
Route::get('/pacientes/cadastro/{id}', 'PacientesController@getPaciente')->name('pacienteId')->middleware('auth');
Route::any('/pacientes/busca', 'PacientesController@buscaPaciente')->name('pacientesBusca');
Route::post('/pacientes/cadastro/novo', 'PacientesController@cadastrarPaciente')->name('cadastrarPaciente')->middleware('auth');
Route::post('/pacientes/cadastro/alterar/{id}', 'PacientesController@alterarPaciente')->name('alterarPaciente')->middleware('auth');
Route::post('/pacientes/delete/{id}', 'PacientesController@deletarPaciente')->name('deletarPaciente')->middleware('auth');; 

Route::get('/vacinas', 'VacinasController@index')->name('vacinas')->middleware('auth');
Route::get('/vacinas/cadastro', 'VacinasController@telaCadastroVacina')->name('telaCadastroVacina')->middleware('auth');
Route::get('/vacinas/cadastro/{id}', 'VacinasController@getVacina')->name('vacinaId')->middleware('auth');
Route::any('/vacinas/busca', 'VacinasController@buscaVacina')->name('vacinasBusca');
Route::post('/vacinas/cadastro/novo', 'VacinasController@cadastrarVacina')->name('cadastrarVacina')->middleware('auth');
Route::post('/vacinas/cadastro/alterar/{id}', 'VacinasController@alterarVacina')->name('alterarVacina')->middleware('auth');
Route::post('/vacinas/delete/{id}', 'VacinasController@deletarVacina')->name('deletarVacina')->middleware('auth');


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


