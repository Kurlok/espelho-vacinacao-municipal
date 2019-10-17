<?php

namespace App\Exports;

use App\Vacina;
use App\Unidade;
use App\Paciente;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;

use Illuminate\Support\Facades\DB;

class VacinasExport implements WithHeadings, ShouldAutoSize, FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $aplicacaoInicial;
    protected $aplicacaoFinal;
    protected $idUsuario;
    protected $idUnidade;
    protected $idVacina;

    public function __construct($aplicacaoInicial, $aplicacaoFinal, $idUnidade, $idUsuario, $idVacina)
    {
        $this->aplicacaoInicial = $aplicacaoInicial;
        $this->aplicacaoFinal = $aplicacaoFinal;
        $this->idUsuario = $idUsuario;
        $this->idUnidade = $idUnidade;
        $this->idVacina = $idVacina;
    }

    public function collection()
    {
        $pesquisa = DB::table('pacientes_vacinas')
            ->where([
                ['fk_vacinas_id', '=', $this->idVacina],
                ['fk_unidades_id', '=', $this->idUnidade],
                ['fk_users_id', '=', $this->idUsuario],
            ])
            ->get();
        return $pesquisa;
    }

    public function headings(): array
    {
        return [
            'Código Paciente',
            'Paciente',
            'Data Nascimento',
            'Vacina',
            'Dose',
            'Descrição Outras',
            'Data de aplicação',
            'Unidade',
            'Usuário que cadastrou',
            'Modificado em',
        ];
    }

    public function array(): array
    {
        $arrayFinal = array();
        if (($this->idVacina != 'todas') || ($this->idUsuario != 'todos') || ($this->idUnidade != 'todas')) {
            if (($this->idVacina != 'todas') && ($this->idUsuario != 'todos') && ($this->idUnidade != 'todas')) {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                        ['fk_unidades_id', '=', $this->idUnidade],
                        ['fk_users_id', '=', $this->idUsuario],
                    ])
                    ->whereDate('data_aplicacao', '>=', $this->aplicacaoInicial)
                    ->whereDate('data_aplicacao', '<=', $this->aplicacaoFinal)
                    ->get();
            } else if (($this->idVacina != 'todas') && ($this->idUsuario != 'todos')) {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                        ['fk_users_id', '=', $this->idUsuario],
                    ])
                    ->whereDate('data_aplicacao', '>=', $this->aplicacaoInicial)
                    ->whereDate('data_aplicacao', '<=', $this->aplicacaoFinal)
                    ->get();
            } else if (($this->idVacina != 'todas') && ($this->idUnidade != 'todas')) {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                        ['fk_unidades_id', '=', $this->idUnidade],
                    ])
                    ->whereDate('data_aplicacao', '>=', $this->aplicacaoInicial)
                    ->whereDate('data_aplicacao', '<=', $this->aplicacaoFinal)
                    ->get();
            } else if (($this->idUsuario != 'todos') && ($this->idUnidade != 'todas')) {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_unidades_id', '=', $this->idUnidade],
                        ['fk_users_id', '=', $this->idUsuario],
                    ])
                    ->whereDate('data_aplicacao', '>=', $this->aplicacaoInicial)
                    ->whereDate('data_aplicacao', '<=', $this->aplicacaoFinal)
                    ->get();
            } else if ($this->idVacina != 'todas') {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                    ])
                    ->whereDate('data_aplicacao', '>=', $this->aplicacaoInicial)
                    ->whereDate('data_aplicacao', '<=', $this->aplicacaoFinal)
                    ->get();
            } else if ($this->idUsuario != 'todos') {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_users_id', '=', $this->idUsuario],

                    ])
                    ->whereDate('data_aplicacao', '>=', $this->aplicacaoInicial)
                    ->whereDate('data_aplicacao', '<=', $this->aplicacaoFinal)
                    ->get();
            } else if ($this->idUnidade != 'todas') {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_unidades_id', '=', $this->idUnidade],
                    ])
                    ->get();
            }
        } else {
            $pesquisa = DB::table('pacientes_vacinas')
                ->whereDate('data_aplicacao', '>=', $this->aplicacaoInicial)
                ->whereDate('data_aplicacao', '<=', $this->aplicacaoFinal)
                ->get();
        }

        foreach ($pesquisa as $tupla) {
            $array = array();
            $paciente = Paciente::find($tupla->fk_pacientes_id);
            $vacina = Vacina::find($tupla->fk_vacinas_id);
            $unidade = Unidade::find($tupla->fk_unidades_id);
            $usuario = User::find($tupla->fk_users_id);

            array_push($array, $paciente->id);
            array_push($array, $paciente->nome);
            array_push($array, $paciente->data_nascimento);

            array_push($array, $vacina->vacina);
            array_push($array, $vacina->dose);
            array_push($array, $tupla->descricao_outras);

            array_push($array, $tupla->data_aplicacao);

            if (isset($unidade)) {
                array_push($array, $unidade->nome);
            }
            if (isset($usuario)) {
                array_push($array, $usuario->name);
            }
            array_push($array, $tupla->updated_at);
            array_push($arrayFinal, $array);
        }

        return [
            $arrayFinal
        ];
    }
}
