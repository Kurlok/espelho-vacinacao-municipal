@extends('layouts.app')

@section('content')
<div class="container">

    <div id="top" class="row">
        <div class="col-md-3">
            <h2>Vacinas</h2>
        </div>
        <div class="col-md-6 ">
            <form action="/vacinas/busca" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input name="q" class="form-control" id="search" type="text" placeholder="Pesquisar">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-3 ">
            <a href="{{ route('vacinasCadastro') }}" class="btn btn-primary pull-right h2">Nova Vacina</a>
        </div>
    </div>

    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Vacina</th>
                        <th>Dose</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($listaVacinas))
                    @foreach ($listaVacinas as $vacina)
                    <tr>
                        <td>{{$vacina->id}}</td>
                        <td>{{$vacina->vacina}}</td>
                        <td>{{$vacina->dose}}</td>

                        <td class="actions">
                            <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                            <a class="btn btn-warning btn-xs" href="#">Editar</a>
                            <a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
    @if(isset($listaVacinas))
    {{ $listaVacinas->links() }}
    @endif
</div>
@endsection