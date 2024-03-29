@extends('layouts.app')

@section('content')
<div class="container">

    <div id="top" class="row">
        <div class="col-md-3">
            <h2><i class="fas fa-syringe"></i> Vacinas</h2>
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
            <a href="{{ route('telaCadastroVacina') }}" class="btn btn-primary pull-right h2"><i class="fas fa-plus"></i> Nova Vacina</a>
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
                        <th>Situação</th>

                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($listaVacinas))
                    @foreach ($listaVacinas as $vacina)
                    <tr class="@if($vacina->status == 'Inativo') text-danger @endif">
                        <td>{{$vacina->id}}</td>
                        <td>{{$vacina->vacina}}</td>
                        <td>{{$vacina->dose}}</td>
                        <td>{{$vacina->status}}</td>

                        <td class="actions">
                            @if($vacina->status == 'Ativo')

                            <a class="btn btn-success btn-xs" href="{{ route('vacinaId', $vacina->id) }}"><i class="far fa-eye"></i> Visualizar</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDesativacaoVacina{{$vacina->id}}">
                                <i class="fas fa-ban"></i> Desativar
                            </button>
                            @else
                            <form action="{{ route('ativarVacina', $vacina->id) }}" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-secondary btn-xs">
                                    <i class="fas fa-power-off"></i> Reativar
                                </button>
                            </form>
                            @endif
                            <div class="modal fade" id="modalDesativacaoVacina{{$vacina->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Desativação de vacina</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Confirma a desativação de {{$vacina->vacina}} (código: {{$vacina->id}})??
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('desativarVacina', $vacina->id) }}" method="post">
                                                {{csrf_field()}}

                                                <button type="submit" class="btn btn-danger btn-xs" value="Desativar">
                                Desativar </button>                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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