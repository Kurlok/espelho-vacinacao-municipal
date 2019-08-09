@extends('layouts.app')

@section('content')
<div class="container">

    <div id="top" class="row">
        <div class="col-md-3">
            <h2>Pacientes</h2>
        </div>
        <div class="col-md-6 ">
            <form action="/pacientes/busca" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input name="q" class="form-control" id="search" type="text" placeholder="Pesquisar nome">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
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
                    @if(isset($listaPacientes))
                    @foreach ($listaPacientes as $paciente)
                    <tr>
                        <td>{{$paciente->id}}</td>
                        <td>{{$paciente->nome}}</td>
                        <td>{{$paciente->localidade}}</td>
                        <td>{{ date('d/m/Y', strtotime($paciente->data_nascimento))}}</td>
                        <td class="actions">
                            <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                            <a class="btn btn-warning btn-xs" href="{{ route('pacientesCadastro') }}">Editar</a>
                            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
    @if(isset($listaPacientes))
    {{ $listaPacientes->links() }}
    @endif
</div>
@endsection