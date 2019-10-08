@extends('layouts.app')
@section('content')
<div class="container">
    <?php
    $usuarioLogado = Illuminate\Support\Facades\Auth::user();


    ?>
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(isset($paciente))
            <form method="POST" action="{{route('alterarPaciente', $paciente->id)}}">
                @else
                <form method="POST" action="{{route('cadastrarPaciente')}}">
                    @endif
                    @csrf
                    <div class="card" id="printableArea" name="printableArea">
                        <div class="card-header bg-success text-white">{{ __('Dados Pessoais') }}</div>

                        <div class="card-body border-secondary">
                            <div class="form-row">
                                <div class="col-md-5">
                                    <p><span class="font-weight-bold"> Nome: </span> {{$paciente->nome}} </p>
                                </div>
                                <div class="col-md-3">
                                    <?php
                                    $origDataNascimento = $paciente->data_nascimento;
                                    $novaDataNascimento = date("d-m-Y", strtotime($origDataNascimento));
                                    $dataNascimento = str_replace('-', '/', $novaDataNascimento);
                                    ?>
                                    <p><span class="font-weight-bold">Data de Nascimento:</span> {{$dataNascimento}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><span class="font-weight-bold">Nº SUS:</span> {{$paciente->sus}} </p>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-5">
                                    <p><span class="font-weight-bold">Mãe:</span> {{$paciente->nome_mae}}</p>
                                </div>
                                <div class="col-md-3">
                                    <p><span class="font-weight-bold">Sexo:</span> @if($paciente->sexo ==='Masculino') Masculino @else Feminino @endif</p>
                                </div>
                                <div class="col-md-2">
                                    <p><span class="font-weight-bold">Gestante:</span> @if($paciente->gestante=='Sim') Sim @else Não @endif</p>
                                </div>
                                <div class="col-md-2">
                                    <p><span class="font-weight-bold">Óbito:</span> @if($paciente->obito=='Sim') Sim @else Não @endif</p>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-5">
                                    <p><span class="font-weight-bold">Localidade:</span> {{$paciente->localidade}}</p>
                                </div>
                                <div class="col-md-3">
                                    <p><span class="font-weight-bold">Telefone:</span> {{$paciente->telefone}}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><span class="font-weight-bold">Telefone Alternativo:</span> {{$paciente->telefone_alternativo}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <p><span class="font-weight-bold">Observações:</span> {{$paciente->observacoes}} </p>
                            </div>
                        </div>
                        <div class="card-header bg-success text-white">{{ __('Vacinas') }}</div>
                        <div class="card-body">

                            <div class="form-row">

                                @foreach($listaVacinas as $vacina)
                                <?php
                                $pivotVacinaPaciente = $vacina->pacientes()->where('fk_pacientes_id', $paciente->id)->firstOrFail()->pivot;
                                ?>
                                @if(isset($vacinaAnterior))
                                @if(($vacinaAnterior->vacina) != ($vacina->vacina))
                            </div>
                            <div class="form-row">

                                @endif
                                @endif
                                <div class="form-group col-md-2">
                                    <span class="font-weight-bold">{{$vacina->vacina}} - {{$vacina->dose}}</span>
                                    <br />
                                    @if($vacina->vacina == "Outras")
                                    {{$pivotVacinaPaciente->descricao_outras}}
                                    <br />

                                    @endif
                                    <?php
                                    $origDataAplicacao = $pivotVacinaPaciente->data_aplicacao;
                                    $novaDataAplicacao = date("d-m-Y", strtotime($origDataAplicacao));
                                    $dataAplicacao = str_replace('-', '/', $novaDataAplicacao);
                                    ?>
                                    @if($pivotVacinaPaciente->data_aplicacao != null)
                                    {{$dataAplicacao}}
                                    @endif
                                </div>

                                @endforeach

                            </div>
                        </div>

                    </div>

                </form>

                <button type="button" class="btn btn-secondary" onclick="window.print()">Imprimir</button>

                <script>
                    window.addEventListener("load", function() {
                        //printDiv('printableArea');
                        window.print();

                    })

                    function printDiv(divName) {
                        // var printContents = $('#' + divName).html();
                        // print($('body').html(printContents));
                        //var printContents = document.getElementById(divName).innerHTML;
                        //document.body.innerHTML = printContents;
                        //window.print();
                        //document.body.innerHTML = originalContents;
                    }
                </script>
                <style>
                    @media print {
                        body * {
                            visibility: hidden;
                        }

                        #printableArea,
                        #printableArea * {
                            visibility: visible;
                            font-size: 18px;
                            color: black;
                        }

                        #printableArea {
                            position: fixed;
                            left: 0;
                            top: 0;
                        }
                    }
                </style>
        </div>
    </div>
    @endsection