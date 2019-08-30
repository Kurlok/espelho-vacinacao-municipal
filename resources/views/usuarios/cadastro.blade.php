@push('scripts')
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.mask.js') }}"></script>

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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning">{{ __('Usuário') }}</div>

                <div class="card-body">
                    @if(isset($usuario))
                    <form method="POST" action="{{route('alterarUsuario', $usuario->id)}}">
                        @else
                        <form method="POST" action="{{route('cadastrarUsuario')}}">
                            @endif
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">{{ __('Nome Completo') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="@if(isset($usuario)){{$usuario->name}}@else {{ old('name') }}@endif " required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="cpf">{{ __('CPF') }}</label>
                                    <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="@if(isset($usuario)){{$usuario->cpf}}@else{{old('cpf')}}@endif" required autocomplete="cpf" autofocus @if(isset($usuario)) disabled @endif>
                                    @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="@if(isset($usuario)){{$usuario->email}}@else{{old('email')}}@endif" required autocomplete="email" @if(isset($usuario)) disabled @endif>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="funcao">{{ __('Função') }}</label>
                                    <input id="funcao" type="text" class="form-control @error('funcao') is-invalid @enderror" name="funcao" value="@if(isset($usuario)){{$usuario->funcao}}@else{{old('funcao')}}@endif" required autocomplete="funcao" autofocus>
                                    @error('funcao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="unidade">Unidade</label>
                                    <input id="unidade" type="unidade" class="form-control @error('unidade') is-invalid @enderror" name="unidade" value="@if(isset($usuario)){{$usuario->unidade}}@else{{old('unidade')}}@endif" required autocomplete="unidade">
                                    @error('unidade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="permissao">Permissão</label>
                                    <select class="form-control @error('permissao') is-invalid @enderror" required id="permissao" name="permissao">
                                        <option value="Administrador" @if(isset($usuario)) @if($usuario->permissao == 'Administrador') selected @endif @endif>Administrador</option>
                                        <option value="Comum" @if(isset($usuario)) @if($usuario->permissao != 'Administrador') selected @endif @else selected @endif > Comum</option>
                                    </select>
                                    @error('permissao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="senha">{{ __('Senha') }}</label>
                                    <input id="senha" type="password" class="form-control @error('senha') is-invalid @enderror" name="senha" required autocomplete="new-senha">
                                    @error('senha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="senha-confirm">{{ __('Confirmação de senha') }}</label>
                                    <input id="senha-confirm" type="password" class="form-control" name="senha_confirmation" required autocomplete="new-senha">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col">
                                    @if(isset($usuario))
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                    @else
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection