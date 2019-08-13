@extends('layouts.app')

@push('scripts')
<script>
    //Input mask
    $(document).ready(function($) {
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('#cep').mask('00000-000');
        $('#rg').mask('000000000000000');

        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.tel').mask('(00) 00000-0000');
        $('.phone_us').mask('(000) 000-0000');
        $('.mixed').mask('AAA 000-S0S');
        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('#cpf').mask('000.000.000-00', {
            reverse: true
        });
        $('.cnpj').mask('00.000.000/0000-00', {
            reverse: true
        });
        $('.money').mask('000.000.000.000.000,00', {
            reverse: true
        });
        $('.money2').mask("#.##0,00", {
            reverse: true
        });
        $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            }
        });
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {
            reverse: true
        });
        $('.clear-if-not-match').mask("00/00/0000", {
            clearIfNotMatch: true
        });
        $('.placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.fallback').mask("00r00r0000", {
            translation: {
                'r': {
                    pattern: /[\/]/,
                    fallback: '/'
                },
                placeholder: "__/__/____"
            }
        });
        $('.selectonfocus').mask("00/00/0000", {
            selectOnFocus: true
        });
    });
</script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(isset($paciente))
            <form method="POST" action="{{route('alterarPaciente', $paciente->id)}}">
                @else
                <form method="POST" action="{{route('cadastrarPaciente')}}">
                    @endif
                    @csrf
                    <div class="card">
                        <div class="card-header bg-warning">{{ __('Dados Pessoais') }}</div>

                        <div class="card-body border-secondary">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="id">Código</label>
                                    <input type="text" class="form-control" name="id" id="id" value="@if(isset($paciente)){{$paciente->id}}@endif" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="idade">Idade</label>
                                    <input type="text" class="form-control" name="idade" id="idade" value="@if(isset($paciente)){{Carbon\Carbon::createFromDate($paciente->data_nascimento)->diff(Carbon\Carbon::now())->format('%yA %mM %dD')}}@endif" disabled>


                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome completo</label>
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo" value="@if(isset($paciente)){{$paciente->nome}}@endif">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="sus">N.º SUS</label>
                                    <input type="text" class="form-control" name="sus" id="sus" placeholder="000000000000000" maxlength="15" value="@if(isset($paciente)){{$paciente->sus}}@endif">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="nome_mae">Nome da mãe</label>
                                    <input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="Nome da mãe" value="@if(isset($paciente)){{$paciente->nome_mae}}@endif">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="data_nascimento">Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="@if(isset($paciente)){{$paciente->data_nascimento}}@endif">
                                </div>

                                <div class="col-md-2 ">
                                    <label for="sexo">Sexo</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexo" id="masculino" value="Masculino" @if(isset($paciente)) @if($paciente->sexo ==='Masculino') checked @endif @endif>
                                            <label class="form-check-label" for="masculino">Masculino</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexo" id="feminino" value="Feminino" @if(isset($paciente)) @if($paciente->sexo ==='Feminino') checked @endif @endif>
                                            <label class="form-check-label" for="feminino">Feminino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="gestante">Gestante</label>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="gestante" name="gestante" @if(isset($paciente)) @if($paciente->gestante==='Sim') checked @endif @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="obito">Óbito</label>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="obito" name="obito" @if(isset($paciente)) @if($paciente->obito==='Sim') checked @endif @endif>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="localidade">Localidade</label>
                                    <input type="text" class="form-control" id="localidade" name="localidade" placeholder="Pinheiral de baixo" value="@if(isset($paciente)){{$paciente->localidade}}@endif">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control tel" id="telefone" name="telefone" placeholder="(00) 00000-0000" value="@if(isset($paciente)){{$paciente->telefone}}@endif">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nome">Telefone Alternativo</label>
                                    <input type="text" class="form-control tel" id="telefone_alternativo" name="telefone_alternativo" placeholder="(00) 00000-0000" value="@if(isset($paciente)){{$paciente->telefone_alternativo}}@endif">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="observacoes">Observações</label>
                                <textarea class="form-control" id="observacoes" name="observacoes" rows="4">@if(isset($paciente)){{$paciente->observacoes}}@endif</textarea>
                            </div>
                        </div>
                        <div class="card-header bg-warning">{{ __('Vacinas') }}</div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="nome">Pólio</label>
                                    <input type="date" class="form-control" id="polio">
                                </div>


                            </div>
                            @if(isset($paciente))
                            <button type="submit" class="btn btn-warning">Alterar</button>

                            @else
                            <button type="submit" class="btn btn-primary">Cadastrar</button>

                            @endif
                        </div>

                    </div>

                </form>

        </div>
    </div>
    @endsection