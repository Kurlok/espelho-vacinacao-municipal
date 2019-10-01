<?php

namespace App\Http\Controllers;

use App\Exports\TodasUnidadesExport;
use App\Vacina;
use Illuminate\Http\Request;
use App\Exports\TodasVacinasExport;
use App\Exports\TodosUsuariosExport;
use Maatwebsite\Excel\Facades\Excel;

class RelatoriosController extends Controller
{
    public function index()
    {
        return view(
            'relatorios/relatorios'
        );
    }

    public function exportarVacinas()
    {
        return Excel::download(new TodasVacinasExport(), 'Espelho de vacinação - Todas as Vacinas.xlsx');
    }

    public function exportarUsuarios()
    {
        return Excel::download(new TodosUsuariosExport(), 'Espelho de vacinação - Todos os Usuarios.xlsx');
    }

    public function exportarUnidades()
    {
        return Excel::download(new TodasUnidadesExport(), 'Espelho de vacinação - Todas as Unidades.xlsx');
    }
}
