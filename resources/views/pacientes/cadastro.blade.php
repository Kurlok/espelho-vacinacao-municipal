@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <form>

                <div class="card">
                    <div class="card-header bg-warning">{{ __('Dados Pessoais') }}</div>

                    <div class="card-body border-secondary">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="id">Código</label>
                                @if(isset($paciente))
                                @endif
                                <input type="text" class="form-control" id="id" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="idade">Idade</label>
                                <input type="text" class="form-control" id="idade" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome">Nome completo</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome completo">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sus">N.º SUS</label>
                                <input type="text" class="form-control" id="sus" placeholder="000000000000000" maxlength="15">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nome_mae">Nome da mãe</label>
                                <input type="text" class="form-control" id="nome_mae" placeholder="Nome da mãe">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="data_nascimento">Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento">
                            </div>

                            <div class="col-md-2 ">
                                <label for="sexo">Sexo</label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="masculino" value="Masculino">
                                        <label class="form-check-label" for="masculino">Masculino</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="feminino" value="Feminino">
                                        <label class="form-check-label" for="feminino">Feminino</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="gestante">Gestante</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="gestante">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="obito">Óbito</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="obito">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="localidade">Localidade</label>
                                <input type="text" class="form-control" id="localidade" placeholder="Pinheiral de baixo">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" placeholder="(00) 00000-0000">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nome">Telefone Alternativo</label>
                                <input type="text" class="form-control" id="telefone_alternativo" placeholder="(00) 00000-0000">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="observacoes">Observações</label>
                            <textarea class="form-control" id="observacoes" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="card-header bg-warning">{{ __('Vacinas') }}</div>
                    <div class="card-body ">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="nome">Pólio</label>
                                <input type="date" class="form-control" id="polio">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="nome">Tríplice</label>
                                <input type="date" class="form-control" id="codigo">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nome">Hepatite A</label>
                                <input type="date" class="form-control" id="codigo">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nome">Hepatite B</label>
                                <input type="date" class="form-control" id="codigo">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nome">Tetravalente</label>
                                <input type="date" class="form-control" id="codigo">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="nome">BCG</label>
                                <input type="date" class="form-control" id="codigo">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>

                    </div>

                </div>

            </form>

        </div>
    </div>
    @endsection