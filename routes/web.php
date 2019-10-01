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

Auth::routes();

Route::middleware(['auth', 'Administrador', 'SenhaRedefinida'])->group(function () {
    Route::get('/vacinas', 'VacinasController@index')->name('vacinas');
    Route::get('/vacinas/cadastro', 'VacinasController@telaCadastroVacina')->name('telaCadastroVacina');
    Route::get('/vacinas/cadastro/{id}', 'VacinasController@getVacina')->name('vacinaId');
    Route::any('/vacinas/busca', 'VacinasController@buscaVacina')->name('vacinasBusca');
    Route::post('/vacinas/cadastro/novo', 'VacinasController@cadastrarVacina')->name('cadastrarVacina');
    Route::post('/vacinas/cadastro/alterar/{id}', 'VacinasController@alterarVacina')->name('alterarVacina');
    //Route::post('/vacinas/delete/{id}', 'VacinasController@deletarVacina')->name('deletarVacina');
    Route::post('/vacinas/desativar/{id}', 'VacinasController@desativarVacina')->name('desativarVacina');
    Route::post('/vacinas/ativar/{id}', 'VacinasController@ativarVacina')->name('ativarVacina');

    Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
    Route::get('/usuarios/cadastro', 'UsuariosController@telaCadastroUsuario')->name('telaCadastroUsuario');
    Route::get('/usuarios/cadastro/{id}', 'UsuariosController@getUsuario')->name('usuarioId');
    Route::post('/usuarios/delete/{id}', 'UsuariosController@deletarUsuario')->name('deletarUsuario');
    Route::post('/usuarios/cadastro/novo', 'UsuariosController@cadastrarUsuario')->name('cadastrarUsuario');
    Route::post('/usuarios/cadastro/alterar/{id}', 'UsuariosController@alterarUsuario')->name('alterarUsuario');
    Route::any('/usuarios/busca', 'UsuariosController@buscaUsuario')->name('usuariosBusca');

    Route::get('/unidades', 'UnidadesController@index')->name('unidades');
    Route::get('/unidades/cadastro', 'UnidadesController@telaCadastroUnidade')->name('telaCadastroUnidade');
    Route::get('/unidades/cadastro/{id}', 'UnidadesController@getUnidade')->name('unidadeId');
    Route::post('/unidades/delete/{id}', 'UnidadesController@deletarUnidade')->name('deletarUnidade');
    Route::post('/unidades/cadastro/novo', 'UnidadesController@cadastrarUnidade')->name('cadastrarUnidade');
    Route::post('/unidades/cadastro/alterar/{id}', 'UnidadesController@alterarUnidade')->name('alterarUnidade');
    Route::any('/unidades/busca', 'UnidadesController@buscaUnidade')->name('unidadesBusca');

    Route::get('/graficos', 'GraficosController@index')->name('graficos');
    Route::post('/graficos/{idVacina}/{idUnidade}/{ano}/{mes}/{periodo}', 'GraficosController@getAplicacoesVacinas');

    Route::get('/relatorios', 'RelatoriosController@index')->name('relatorios');
    Route::get('/relatorios/vacinas/todas', 'RelatoriosController@exportarVacinas');
    Route::get('/relatorios/unidades/todas', 'RelatoriosController@exportarUnidades');
    Route::get('/relatorios/usuarios/todos', 'RelatoriosController@exportarUsuarios');
    Route::get('/relatorios/pacientes/todos', 'RelatoriosController@exportarPacientes');
    Route::get('/relatorios/pacientes/nascimento/{dataInicial}/{dataFinal}', 'RelatoriosController@exportarPacientesDataNascimento');

});

Route::middleware(['auth', 'SenhaRedefinida'])->group(function () {
    Route::get('/pacientes', 'PacientesController@index')->name('pacientes');
    Route::get('/pacientes/cadastro', 'PacientesController@telaCadastroPaciente')->name('telaCadastroPaciente');
    Route::get('/pacientes/cadastro/{id}', 'PacientesController@getPaciente')->name('pacienteId');
    Route::any('/pacientes/busca', 'PacientesController@buscaPaciente')->name('pacientesBusca');
    Route::post('/pacientes/cadastro/novo', 'PacientesController@cadastrarPaciente')->name('cadastrarPaciente');
    Route::post('/pacientes/cadastro/alterar/{id}', 'PacientesController@alterarPaciente')->name('alterarPaciente');
    Route::post('/pacientes/delete/{id}', 'PacientesController@deletarPaciente')->name('deletarPaciente');
});

Route::middleware(['auth'])->group(function () {

Route::get('/usuarios/redefinir', 'UsuariosController@telaRedefinirSenha')->name('telaRedefinirSenha');
Route::post('/usuarios/redefinir/altera/{id}', 'UsuariosController@redefinirSenha')->name('redefinirSenha');

});
