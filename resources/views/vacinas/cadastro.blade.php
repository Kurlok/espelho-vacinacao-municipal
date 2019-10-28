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
                                <label for="inicioMinimoDias" class="col-md-2 col-form-label">Início mínimo</label>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="inicioMinimoDias" name="inicioMinimoDias" required>
                                        <option disabled selected>Dias</option>
                                        @for ($i = 0; $i < 60; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->inicio_minimo_dias == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="inicioMinimoMeses" name="inicioMinimoMeses" required>
                                        <option disabled selected>Meses</option>
                                        @for ($i = 0; $i < 24; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->inicio_minimo_meses == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="inicioMinimoAnos" name="inicioMinimoAnos" required>
                                        <option disabled selected>Anos</option>
                                        @for ($i = 0; $i < 201; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->inicio_minimo_anos == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="inicioMaximoDias" class="col-md-2 col-form-label">Início máximo</label>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="inicioMaximoDias" name="inicioMaximoDias" required>
                                        <option disabled selected>Dias</option>
                                        @for ($i = 0; $i < 60; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->inicio_maximo_dias == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="inicioMaximoMeses" name="inicioMaximoMeses" required>
                                        <option disabled selected>Meses</option>
                                        @for ($i = 0; $i < 24; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->inicio_maximo_meses == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="inicioMaximoAnos" name="inicioMaximoAnos" required>
                                        <option disabled selected>Anos</option>
                                        @for ($i = 0; $i < 201; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->inicio_maximo_anos == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="vacinaExigida" class="col-md-2 col-form-label">Vacina exigida</label>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="vacinaExigida" name="vacinaExigida" required>
                                        <option value="nenhuma">Nenhuma</option>
                                        @foreach($listaVacinas as $vlistada)
                                        <?php $contador = 1 ?>
                                        <option value="{{$vlistada->id}}" @if(isset($vacina)) @if($vlistada->vacina_exigida_id == $vacina->id) selected @endif @endif>
                                            {{$vlistada->vacina}} - {{$vlistada->dose}} - {{$vacina->id}} - {{$vlistada->vacina_exigida_id}}
                                        </option>
                                        <?php $contador++ ?>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="intervaloRecomendado" class="col-md-2 col-form-label">Intervalo recomendado</label>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="intervaloRecomendadoDias" name="intervaloRecomendadoDias" required>
                                        <option disabled selected>Dias</option>
                                        @for ($i = 0; $i < 60; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->intervalo_recomendado_dias == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="intervaloRecomendadoMeses" name="intervaloRecomendadoMeses" required>
                                        <option disabled selected>Meses</option>
                                        @for ($i = 0; $i < 24; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->intervalo_recomendado_meses == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="intervaloRecomendadoAnos" name="intervaloRecomendadoAnos" required>
                                        <option disabled selected>Anos</option>
                                        @for ($i = 0; $i < 201; $i++) <option value="{{$i}}" @if(isset($vacina)) @if($vacina->intervalo_recomendado_anos == $i) selected @endif @endif>
                                            {{$i}}
                                            </option>
                                            @endfor
                                    </select>
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