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
Route::get('/pacientes/cadastro', 'PacientesController@cadastrarPaciente')->name('pacientesCadastro')->middleware('auth');
Route::get('/pacientes/{id}', 'PacientesController@getPaciente')->name('pacienteId')->middleware('auth');
Route::get('/pacientes/paginacao', 'HomeController@getUsers')->name('pacientespaginacao')->middleware('auth');
Route::any('/pacientes/busca', 'PacientesController@buscaPaciente')->name('pacientesBusca');

Route::get('/vacinas', 'VacinasController@index')->name('vacinas')->middleware('auth');
Route::get('/vacinas/cadastro', 'VacinasController@cadastrarVacina')->name('vacinasCadastro')->middleware('auth');



Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


