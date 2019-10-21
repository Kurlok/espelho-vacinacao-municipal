@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(isset($vacina))
            <form method="POST" action="{{route('alterarVacina', $vacina->id)}}">
                @else
                <form method="POST" action="{{route('cadastrarVacina')}}">
                    @endif

                    @csrf

                    <div class="card">
                        <div class="card-header bg-success text-white">{{ __('Vacina') }}</div>

                        <div class="card-body border-secondary">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="id">Código</label>
                                    <input type="text" class="form-control" id="id" value="@if(isset($vacina)){{$vacina->id}}@endif" disabled>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="nome">Vacina</label>
                                    <input type="text" class="form-control" id="vacina" name="vacina" maxlength="100" placeholder="Nome da vacina" value="@if(isset($vacina)){{$vacina->vacina}}@else{{old('vacina')}}@endif">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="sus">Dose</label>
                                    <input type="text" class="form-control" id="dose" name="dose" maxlength="50" value="@if(isset($vacina)){{$vacina->dose}}@else{{old('dose')}}@endif">
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inicioMinimoDias" class="col-md-2 col-form-label">Início mínimo (em dias)</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="inicioMinimoDias" name="inicioMinimoDias">
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inicioMaximoDias" class="col-md-2 col-form-label">Início máximo (em dias)</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" id="inicioMaximoDias" name="inicioMaximoDias">
                                </div>

                            </div>
                            @if(isset($vacina))
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