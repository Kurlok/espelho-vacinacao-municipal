<?php

namespace App\Http\Controllers;

use App\Vacina;
use App\Unidade;
use App\User;

use Illuminate\Http\Request;
use App\Exports\TodasUnidadesExport;
use App\Exports\TodasVacinasExport;
use App\Exports\TodosPacientesExport;
use App\Exports\TodosUsuariosExport;
use App\Exports\DataNascimentoPacientesExport;
use App\Exports\VacinasExport;
use App\Exports\VacinasAtrasadasExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class RelatoriosController extends Controller
{
    public function index()
    {
        $listaVacinas = Vacina::all();
        $listaUnidades = Unidade::all();
        $listaUsuarios = User::all();

        return view(
            'relatorios/relatorios',
            [
                'listaVacinas' => $listaVacinas,
                'listaUnidades' => $listaUnidades,
                'listaUsuarios' => $listaUsuarios
            ]
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

    public function exportarPacientesDataNascimento(Request $request)
    {
        $dataInicial = $request->nascimentoInicial;
        $dataFinal = $request->nascimentoFinal;

        $dataInicialFormatada =  Carbon::parse($dataInicial);
        $dataInicialFormatada = $dataInicialFormatada->format('d-m-Y');

        $dataFinalFormatada =  Carbon::parse($dataFinal);
        $dataFinalFormatada = $dataFinalFormatada->format('d-m-Y');

        return Excel::download(new DataNascimentoPacientesExport($dataInicial, $dataFinal), 'Pacientes nascidos entre ' . $dataInicialFormatada . ' e ' . $dataFinalFormatada . '.xlsx');
    }

    public function exportarVacinaEspecifica(Request $request)
    {
        $dataInicial = $request->aplicacaoInicial;
        $dataFinal = $request->aplicacaoFinal;
        $idUnidade = $request->unidade;
        $idUsuario = $request->usuario;
        $idVacina = $request->vacina;

        if ($idVacina != 'todas') {
            $vacinaEscolhida = Vacina::find($idVacina);
            $vacinaEscolhidaNome = $vacinaEscolhida->vacina . ' - ' . $vacinaEscolhida->dose;
        } else {
            $vacinaEscolhidaNome = "Todas vacinas";
        }

        if ($idUnidade != 'todas') {
            $unidadeEscolhida = Unidade::find($idUnidade)->nome;
        } else {
            $unidadeEscolhida = "Todas unidades";
        }
        if ($idUsuario != 'todos') {
            $usuarioEscolhido = User::find($idUsuario)->name;
        } else {
            $usuarioEscolhido = "Todos usuários";

        }

        $dataInicialFormatada =  Carbon::parse($dataInicial);
        $dataInicialFormatada = $dataInicialFormatada->format('d-m-Y');

        $dataFinalFormatada =  Carbon::parse($dataFinal);
        $dataFinalFormatada = $dataFinalFormatada->format('d-m-Y');

        return Excel::download(new VacinasExport($dataInicial, $dataFinal, $idUnidade, $idUsuario, $idVacina), $vacinaEscolhidaNome . ' - ' . $dataInicialFormatada . ' a ' . $dataFinal . ' - ' .  $unidadeEscolhida .' - '. $usuarioEscolhido. '.xlsx');
    }

    public function exportarVacinasPendentes(Request $request)
    {
        $dataInicial = $request->periodoInicial;
        $dataFinal = $request->periodoFinal;
        $idVacina = $request->vacina;

        $vacinaEscolhida = Vacina::find($idVacina);

        $dataInicialFormatada =  Carbon::parse($dataInicial);
        $dataInicialFormatada = $dataInicialFormatada->format('d-m-Y');

        $dataFinalFormatada =  Carbon::parse($dataFinal);
        $dataFinalFormatada = $dataFinalFormatada->format('d-m-Y');

        return Excel::download(new VacinasAtrasadasExport($dataInicial, $dataFinal, $idVacina), 'Pendências ' . $vacinaEscolhida->vacina . ' - ' . $vacinaEscolhida->dose . ' - ' . $dataInicialFormatada . ' a ' . $dataFinalFormatada . '.xlsx');
    }
}
