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
                    <div class="card-header bg-warning">{{ __('Vacina') }}</div>

                    <div class="card-body border-secondary">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="id">Código</label>
                                <input type="text" class="form-control" id="id" value="@if(isset($vacina)){{$vacina->id}}@endif" disabled>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="nome">Vacina</label>
                                <input type="text" class="form-control" id="vacina" name="vacina" placeholder="Nome da vacina" value="@if(isset($vacina)){{$vacina->vacina}}@endif">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sus">Dose</label>
                                <input type="text" class="form-control" id="dose" name="dose" maxlength="15" value="@if(isset($vacina)){{$vacina->dose}}@endif">
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