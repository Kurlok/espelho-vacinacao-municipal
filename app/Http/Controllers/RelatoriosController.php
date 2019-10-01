<?php

namespace App\Http\Controllers;

use App\Exports\DataNascimentoPacientesExport;
use App\Exports\TodasUnidadesExport;
use App\Vacina;
use Illuminate\Http\Request;
use App\Exports\TodasVacinasExport;
use App\Exports\TodosPacientesExport;
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
        return Excel::download(new TodosUsuariosExport(), 'Espelho de vacinação - Todos os Usuários.xlsx');
    }

    public function exportarUnidades()
    {
        return Excel::download(new TodasUnidadesExport(), 'Espelho de vacinação - Todas as Unidades.xlsx');
    }

    public function exportarPacientes()
    {
        return Excel::download(new TodosPacientesExport(), 'Espelho de vacinação - Todos os Pacientes.xlsx');
    }

    public function exportarPacientesDataNascimento($dataInicial, $dataFinal)
    {
        return Excel::download(new DataNascimentoPacientesExport($dataInicial, $dataFinal), 'Espelho de vacinação - Pacientes por data de nascimento.xlsx');
    }
}
