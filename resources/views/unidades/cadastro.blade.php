@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
        @if(isset($unidade))
            <form method="POST" action="{{route('alterarUnidade', $unidade->id)}}">
                @else
                <form method="POST" action="{{route('cadastrarUnidade')}}">
                    @endif

            @csrf

                <div class="card">
                    <div class="card-header bg-success text-white">{{ __('Unidade') }}</div>

                    <div class="card-body border-secondary">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="id">Código</label>
                                <input type="text" class="form-control" id="id" value="@if(isset($unidade)){{$unidade->id}}@endif" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" maxlength="255" name="nome" placeholder="Nome da unidade" value="@if(isset($unidade)){{$unidade->nome}}@else{{old('nome')}}@endif">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" maxlength="255" value="@if(isset($unidade)){{$unidade->endereco}}@else{{old('dose')}}@endif">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="cnes">CNES</label>
                                <input type="text" class="form-control" name="cnes" id="cnes" maxlength="50" value="@if(isset($unidade)){{$unidade->cnes}}@endif">
                            </div>
                        </div>
                        @if(isset($unidade))
                            <button type="submit" class="btn btn-primary">Alterar</button>
                            @else
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            @endif
                    </div>


                </div>

            </form>

        </div>
    </div>
    @endsection