<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;
use App\Vacina;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    public function index()
    {
        $listaVacinas = Vacina::all();
        $listaUnidades = Unidade::all();

        return view(
            'graficos/graficos',
            [
                'listaVacinas' => $listaVacinas,
                'listaUnidades' => $listaUnidades,

            ]
        );
    }

    public function getAplicacoesVacinas($idUnidade, $idVacina, $ano, $mes)
    {
        if ($idUnidade != "todas") {
            $totalDeVacinas = DB::table('pacientes_vacinas')
            ->where([
                ['fk_unidades_id', '=', $idUnidade],
                ['fk_vacinas_id', '=',  $idVacina],
            ])
            ->whereYear('data_aplicacao', $ano)
            ->whereMonth('data_aplicacao', $mes)
            ->count();
        }

        return json_encode($totalDeVacinas);
    }
}
