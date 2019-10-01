@extends('layouts.app')

@section('content')
<div class="container">
    <div id="top" class="row">
        <div class="col-md-3">
            <h2><i class="fas fa-file-export"></i> Relatórios</a></h2>
        </div>
    </div>

    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="col-md-10">Exportar</th>

                        <th class="actions col-md-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Todas as vacinas</td>
                        <td class="actions">
                            <form action="relatorios/vacinas/todas" method="get">
                                <button type="submit" class="btn btn-success btn-xs">
                                    <i class="far fa-file-excel"></i> Excel
                                </button>
                            </form>  
                        </td>
                    </tr>

                    <tr>
                        <td>Todos os usuários</td>
                        <td class="actions">
                            <form action="relatorios/usuarios/todos" method="get">
                                <button type="submit" class="btn btn-success btn-xs">
                                    <i class="far fa-file-excel"></i> Excel
                                </button>
                            </form>  
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection