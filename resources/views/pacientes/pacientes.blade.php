@extends('layouts.app')

@section('content')
<div class="container">

    <div id="top" class="row">
        <div class="col-md-3">
            <h2>Pacientes</h2>
        </div>
        <div class="col-md-6 ">
            <div class="input-group">
                <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar nome">
                <span class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="col-md-3 ">
            <a href="add.html" class="btn btn-primary pull-right h2">Novo Paciente</a>
        </div>
    </div>

    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Localidade</th>
                        <th>Data de nascimento</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>224</td>
                        <td>Felipe Augusto Barcelos</td>
                        <td>Centro</td>
                        <td>16/02/1990</td>
                        <td class="actions">
                            <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                            <a class="btn btn-warning btn-xs" href="{{ route('pacientesCadastro') }}">Editar</a>
                            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
  </ul>
</nav>


</div>
@endsection