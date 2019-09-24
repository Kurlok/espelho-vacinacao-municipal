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

    public function getAplicacoesVacinas($idVacina, $idUnidade, $ano, $mes, $periodo)
    {
        $arrayPeriodo = [];

        if ($periodo == 'anual') {
            $numVacinasMes = 0;
            for ($numMes = 1; $numMes <= 12; $numMes++) {
                if ($idUnidade != "todas") {
                    $numVacinasMes = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_unidades_id', '=', $idUnidade],
                            ['fk_vacinas_id', '=',  $idVacina],
                        ])
                        ->whereYear('data_aplicacao', $ano)
                        ->whereMonth('data_aplicacao', $numMes)
                        ->count();
                } else {
                    $numVacinasMes = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_vacinas_id', '=',  $idVacina],
                        ])
                        ->whereYear('data_aplicacao', $ano)
                        ->whereMonth('data_aplicacao', $numMes)
                        ->count();
                }
                array_push($arrayPeriodo, $numVacinasMes);
            }
        } else { 
            $arrayMes = [];
            $numVacinasDia = 0;
            for ($numDia = 1; $numDia <= 31; $numDia++) {
                if ($idUnidade != "todas") {
                    $numVacinasDia = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_unidades_id', '=', $idUnidade],
                            ['fk_vacinas_id', '=',  $idVacina],
                        ])
                        ->whereYear('data_aplicacao', $ano)
                        ->whereMonth('data_aplicacao', $mes)
                        ->whereDay('data_aplicacao', $numDia)
                        ->count();
                } else {
                    $numVacinasDia = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_vacinas_id', '=',  $idVacina],
                        ])
                        ->whereYear('data_aplicacao', $ano)
                        ->whereMonth('data_aplicacao', $mes)
                        ->whereDay('data_aplicacao', $numDia)
                        ->count();
                }
                array_push($arrayPeriodo, $numVacinasDia);
            }
        };

        return json_encode($arrayPeriodo);
    }
}
