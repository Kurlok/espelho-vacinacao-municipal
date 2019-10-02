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
            'Vacina',
            'Data de aplicação',
            'Usuário que cadastrou',
            'Unidade',
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
                    ->get();
            } else if (($this->idVacina != 'todas') && ($this->idUsuario != 'todos')) {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                        ['fk_users_id', '=', $this->idUsuario],
                        ['data_aplicacao', '>=', $this->aplicacaoInicial],
                        ['data_aplicacao', '<=', $this->aplicacaoFinal],
                    ])
                    ->get();
            } else if (($this->idVacina != 'todas') && ($this->idUnidade != 'todas')) {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                        ['fk_unidades_id', '=', $this->idUnidade],
                        ['data_aplicacao', '>=', $this->aplicacaoInicial],
                        ['data_aplicacao', '<=', $this->aplicacaoFinal],
                    ])
                    ->get();
            } else if (($this->idUsuario != 'todos') && ($this->idUnidade != 'todas')) {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_unidades_id', '=', $this->idUnidade],
                        ['fk_users_id', '=', $this->idUsuario],
                        ['data_aplicacao', '>=', $this->aplicacaoInicial],
                        ['data_aplicacao', '<=', $this->aplicacaoFinal],
                    ])
                    ->get();
            } else if ($this->idVacina != 'todas') {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                        ['data_aplicacao', '>=', $this->aplicacaoInicial],
                        ['data_aplicacao', '<=', $this->aplicacaoFinal],
                    ])
                    ->get();
            } else if ($this->idUsuario != 'todos') {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_users_id', '=', $this->idUsuario],
                        ['data_aplicacao', '>=', $this->aplicacaoInicial],
                        ['data_aplicacao', '<=', $this->aplicacaoFinal],
                    ])
                    ->get();
            } else if ($this->idUnidade != 'todas') {
                $pesquisa = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_unidades_id', '=', $this->idUnidade],
                        ['data_aplicacao', '>=', $this->aplicacaoInicial],
                        ['data_aplicacao', '<=', $this->aplicacaoFinal],
                    ])
                    ->get();
            }
        } else {
            $pesquisa = DB::table('pacientes_vacinas')
                ->where([
                    ['data_aplicacao', '>=', $this->aplicacaoInicial],
                    ['data_aplicacao', '<=', $this->aplicacaoFinal],
                ])
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
            array_push($array, $vacina->vacina);
            array_push($array, $tupla->data_aplicacao);
            if ($usuario != null) {
                array_push($array, $usuario->name);
            }
            if ($unidade != null) {
                array_push($array, $unidade->nome);
            }
            array_push($arrayFinal, $array);
        }

        // foreach ($listaPacientes as $paciente) {
        //     $paciente->
        //     $array = array();
        //     array_push($array, $inscricao->id);
        //     array_push($array, $inscricao->created_at);
        //     array_push($array, mb_strtoupper($inscricao->nome, 'UTF-8'));
        //     array_push($array, $inscricao->dataNascimento);
        //     array_push($array, $inscricao->cpf);
        //     array_push($array, $inscricao->rg);
        //     // array_push($array, $inscricao->ufRg);
        //     // array_push($array, $inscricao->orgaoExpedidor);
        //     array_push($array, $inscricao->sexo);
        //     array_push($array, $inscricao->email);
        //     array_push($array, $inscricao->telefone);
        //     array_push($array, $inscricao->telefoneAlternativo);
        //     array_push($array, $inscricao->cep);
        //     array_push($array, $inscricao->uf);
        //     array_push($array, mb_strtoupper($inscricao->cidade, 'UTF-8'));
        //     array_push($array, mb_strtoupper($inscricao->bairro, 'UTF-8'));
        //     array_push($array, mb_strtoupper($inscricao->rua, 'UTF-8'));
        //     array_push($array, mb_strtoupper($inscricao->numero, 'UTF-8'));
        //     array_push($array, mb_strtoupper($inscricao->complemento, 'UTF-8'));
        //     array_push($array, $inscricao->deficiencia);
        //     array_push($array, mb_strtoupper($inscricao->deficienciaDescricao, 'UTF-8'));

        //     $empregoBusca = Vaga::find($inscricao->fk_vagas_id);
        //     $empregoNome = $empregoBusca->emprego;
        //     array_push($array, $empregoNome);
        //     $somaPontos = 0;
        //     $i = 1;

        //     foreach ($inscricao->titulos as $tit) {
        //         array_push($array, $tit->titulo);
        //         array_push($array, $tit->pontos);
        //         $somaPontos = $somaPontos + $tit->pontos;
        //         $i = $i + 1;
        //     }

        //     while ($i <= 5) {
        //         array_push($array, "");
        //         array_push($array, "");
        //         $i++;
        //     }
        //     array_push($array, $somaPontos);
        //     array_push($arrayFinal, $array);
        // }

        return [
            $arrayFinal
        ];
    }
}
