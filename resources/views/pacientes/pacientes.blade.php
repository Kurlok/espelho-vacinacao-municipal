@extends('layouts.app')

@section('content')
<div class="container">

    <div id="top" class="row">
        <div class="col-md-3">
            <h2><i class="fas fa-address-card"></i> Pacientes</h2>
        </div>
        <div class="col-md-6 ">
            <form action="/pacientes/busca" method="POST" role="search">
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
            <a href="{{ route('telaCadastroPaciente') }}" class="btn btn-primary pull-right h2"><i class="fas fa-plus"></i> Novo Paciente</a>
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
                        <th>Nº SUS</th>
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
                        <td>{{ $paciente->sus}}</td>

                        <td class="actions">
                            {{--
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalVisualizarPaciente{{$paciente->id}}">
                                Visualizar
                            </button>
                            --}}
                            
                            <a class="btn btn-success btn-xs" href="{{ route('pacienteId', $paciente->id) }}"><i class="far fa-eye"></i> Visualizar</a>
                            @if(($paciente->fk_users_id == Illuminate\Support\Facades\Auth::id()) || (Auth::user()->permissao == 'Administrador'))   
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclusaoPaciente{{$paciente->id}}">
                            <i class="fas fa-trash"></i> Excluir
                            </button>
                            @endif
                            
                            {{--<div class="modal fade" id="modalVisualizarPaciente{{$paciente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">{{$paciente->nome}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Código: {{$paciente->id}}
                                            <br />

                                            Data de nascimento:

                                            // $origDate = $paciente->data_nascimento;
                                            // $newDate = date("d-m-Y", strtotime($origDate));
                                            // $date = str_replace('-', '/', $newDate);
                                            // echo $date;
                                            <br/>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}

                            <div class="modal fade" id="modalExclusaoPaciente{{$paciente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Exclusão de paciente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Confirma a exclusão de {{$paciente->nome}} (código: {{$paciente->id}})??
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('deletarPaciente', $paciente->id) }}" method="post">
                                                {{csrf_field()}}
                                                <input type="submit" class="btn btn-danger btn-xs" value="Excluir">
                                            </form>
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
    @if(isset($listaPacientes))
    {{ $listaPacientes->links() }}
    @endif
</div>
@endsection