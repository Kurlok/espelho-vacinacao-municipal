@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <form>

                <div class="card">
                    <div class="card-header bg-warning">{{ __('Vacina') }}</div>

                    <div class="card-body border-secondary">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="id">Código</label>
                                <input type="text" class="form-control" id="id" value="@if(isset($paciente)){{$paciente->id}}@endif" disabled>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="nome">Vacina</label>
                                <input type="text" class="form-control" id="vacina" placeholder="Nome da vacina" value="@if(isset($paciente)){{$paciente->nome}}@endif">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sus">Dose</label>
                                <input type="text" class="form-control" id="dose" maxlength="15" value="@if(isset($paciente)){{$paciente->sus}}@endif">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                    </div>


                </div>

            </form>

        </div>
    </div>
    @endsection