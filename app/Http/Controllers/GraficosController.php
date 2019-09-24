<?php

namespace App\Http\Controllers;

use App\Paciente;
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

        //Procura dados para todos os meses do ano inteiro
        if ($periodo == 'anual') {
            $numVacinas = 0;
            for ($numMes = 1; $numMes <= 12; $numMes++) { //Busca o número de vacinas para cada mês para a unidade específica
                if ($idUnidade != "todas") {
                    $numVacinas = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_unidades_id', '=', $idUnidade],
                            ['fk_vacinas_id', '=',  $idVacina],
                        ])
                        ->whereYear('data_aplicacao', $ano)
                        ->whereMonth('data_aplicacao', $numMes)
                        ->count();
                } else { //Busca o número de vacinas para cada mês para todas as unidades
                    $numVacinas = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_vacinas_id', '=',  $idVacina],
                        ])
                        ->whereYear('data_aplicacao', $ano)
                        ->whereMonth('data_aplicacao', $numMes)
                        ->count();
                }
                array_push($arrayPeriodo, $numVacinas);
            }
            //Procura a quantidade de pacientes do sexo para o ano
            $numVacinasMasculino = 0;
            $numVacinasFeminino = 0;
            $numVacinasSexo = [];
            if ($idUnidade != "todas") {
                $pacientesPeriodo = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_unidades_id', '=', $idUnidade],
                        ['fk_vacinas_id', '=',  $idVacina],
                    ])
                    ->whereYear('data_aplicacao', $ano)
                    ->get();
            } else {
                $pacientesPeriodo = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=',  $idVacina],
                    ])
                    ->whereYear('data_aplicacao', $ano)
                    ->get();
            }
        } else { //Procura dados para todos os dias do mês inteiro
            $numVacinas = 0;
            for ($numDia = 1; $numDia <= 31; $numDia++) {
                if ($idUnidade != "todas") { //Busca o número de vacinas para cada dia do mês para a unidade específica
                    $numVacinas = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_unidades_id', '=', $idUnidade],
                            ['fk_vacinas_id', '=',  $idVacina],
                        ])
                        ->whereYear('data_aplicacao', $ano)
                        ->whereMonth('data_aplicacao', $mes)
                        ->whereDay('data_aplicacao', $numDia)
                        ->count();
                } else { //Busca o número de vacinas para cada dia do mês para todas as unidades
                    $numVacinas = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_vacinas_id', '=',  $idVacina],
                        ])
                        ->whereYear('data_aplicacao', $ano)
                        ->whereMonth('data_aplicacao', $mes)
                        ->whereDay('data_aplicacao', $numDia)
                        ->count();
                }
                array_push($arrayPeriodo, $numVacinas);
            }
            //Procura a quantidade de pacientes do sexo para o mês
            $numVacinasMasculino = 0;
            $numVacinasFeminino = 0;
            $numVacinasSexo = [];
            if ($idUnidade != "todas") {
                $pacientesPeriodo = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_unidades_id', '=', $idUnidade],
                        ['fk_vacinas_id', '=',  $idVacina],
                    ])
                    ->whereYear('data_aplicacao', $ano)
                    ->whereMonth('data_aplicacao', $mes)
                    ->get();
            } else {
                $pacientesPeriodo = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=',  $idVacina],
                    ])
                    ->whereYear('data_aplicacao', $ano)
                    ->whereMonth('data_aplicacao', $mes)
                    ->get();
            }
        };

        //Vai contabilizando quantos de cada sexo para a busca
        foreach ($pacientesPeriodo as $value) {
            foreach ($value as $chave => $valor) {
                if ($chave == 'fk_pacientes_id') {
                    $paciente = Paciente::find($valor);
                    if ($paciente->sexo == 'Masculino') {
                        $numVacinasMasculino++;
                    } elseif ($paciente->sexo == 'Feminino') {
                        $numVacinasFeminino++;
                    }
                }
            }
        }
        
        array_push($numVacinasSexo, $numVacinasMasculino);
        array_push($numVacinasSexo, $numVacinasFeminino);

        $arrayFinal = [];
        array_push($arrayFinal, $arrayPeriodo);
        array_push($arrayFinal, $numVacinasSexo);

        return json_encode($arrayFinal);
    }


}
