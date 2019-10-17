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
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class VacinasAtrasadasExport implements WithHeadings, ShouldAutoSize, FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $periodoInicial;
    protected $periodoFinal;
    protected $idUsuario;
    protected $idUnidade;
    protected $idVacina;

    public function __construct($periodoInicial, $periodoFinal, $idVacina)
    {
        $this->periodoInicial = $periodoInicial;
        $this->periodoFinal = $periodoFinal;
        $this->idVacina = $idVacina;
    }

    public function collection()
    {
        //
    }

    public function headings(): array
    {
        return [
            'Código Paciente',
            'Paciente',
            'Data de nascimento',
            'Vacina',
            'Dose',
            'Início Mínimo (Dias)',
            'Início Mínimo (Meses)',
            'Início Mínimo (Anos)',
            'Início Máximo (Dias)',
            'Início Máximo (Meses)',
            'Início Máximo (Anos)',
            'Data Inicial',
            'Data Final',
            'Data quando a vacina estará pendente',

        ];
    }

    public function array(): array
    {
        $arrayFinal = array();

        $listaPacientes = Paciente::all();
        $listaVacinas = Vacina::all();
        $periodoInicialCarbon = $this->periodoInicial;
        $periodoFinalCarbon = $this->periodoFinal;

        if ($this->idVacina != 'todas') {
            foreach ($listaPacientes as $paciente) {
                $array = array();
                $idadePaciente = Carbon::createFromDate($paciente->data_nascimento)->diff(Carbon::now());
                $idadePacienteAnos = $idadePaciente->format('%y');
                $idadePacienteMeses = $idadePaciente->format('%m');
                $idadePacienteDias = $idadePaciente->format('%d');

                $naoExisteRegistroVacina = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                        ['fk_pacientes_id', '=', $paciente->id]
                    ])
                    ->doesntExist();

                if ($naoExisteRegistroVacina) {
                    $vacinaEscolhida = Vacina::find($this->idVacina);
                    $vacinaAtrasada = false;

                    $idadePeriodoInicial = Carbon::createFromDate($paciente->data_nascimento)->diff($periodoInicialCarbon);
                    $idadePeriodoFinal =  Carbon::createFromDate($paciente->data_nascimento)->diff($periodoFinalCarbon);

                    $periodo = CarbonPeriod::create($periodoInicialCarbon, $periodoFinalCarbon);

                    // Iterando a cada dia no período
                    foreach ($periodo as $data) {
                        $idadeData = Carbon::createFromDate($paciente->data_nascimento)->diff($data);
                        $idadeDataAnos = $idadeData->format('%y');
                        $idadeDataMeses = $idadeData->format('%m');
                        $idadeDataDias = $idadeData->format('%d');

                        if ($idadeDataDias >= $vacinaEscolhida->inicio_minimo_dias && $idadeDataDias <= $vacinaEscolhida->inicio_maximo_dias) {
                            $vacinaAtrasada = true;
                        } else {
                            $vacinaAtrasada = false;
                        }
                        if ($idadeDataMeses > $vacinaEscolhida->inicio_minimo_meses && $idadeDataMeses < $vacinaEscolhida->inicio_maximo_meses) {
                            $vacinaAtrasada = true;
                        } else {
                            $vacinaAtrasada = false;
                        }
                        if ($idadeDataAnos > $vacinaEscolhida->inicio_minimo_anos && $idadeDataAnos < $vacinaEscolhida->inicio_maximo_anos) {
                            $vacinaAtrasada = true;
                        } else {
                            $vacinaAtrasada = false;
                        }
                        if ($vacinaAtrasada) {
                            array_push($array, $paciente->id);
                            array_push($array, $paciente->nome);
                            array_push($array, $paciente->data_nascimento);
                            array_push($array, $vacinaEscolhida->vacina);
                            array_push($array, $vacinaEscolhida->dose);
                            array_push($array, $vacinaEscolhida->inicio_minimo_dias);
                            array_push($array, $vacinaEscolhida->inicio_minimo_meses);
                            array_push($array, $vacinaEscolhida->inicio_minimo_anos);
                            array_push($array, $vacinaEscolhida->inicio_maximo_dias);
                            array_push($array, $vacinaEscolhida->inicio_maximo_meses);
                            array_push($array, $vacinaEscolhida->inicio_maximo_anos);
                            array_push($array, $periodoInicialCarbon);
                            array_push($array, $periodoFinalCarbon);
                            array_push($array, $data);
                            array_push($arrayFinal, $array);
                            break;
                        }
                    }
                }
            }
        } else {
            foreach ($listaPacientes as $paciente) {
                $idadePaciente = Carbon::createFromDate($paciente->data_nascimento)->diff(Carbon::now());
                $idadePacienteAnos = $idadePaciente->format('%y');
                $idadePacienteMeses = $idadePaciente->format('%m');
                $idadePacienteDias = $idadePaciente->format('%d');

                foreach ($listaVacinas as $vacina) {
                    $naoExisteRegistroVacina = DB::table('pacientes_vacinas')
                        ->where([
                            ['fk_vacinas_id', '=', $vacina->id],
                            ['fk_pacientes_id', '=', $paciente->id]
                        ])
                        ->doesntExist();
                    if ($naoExisteRegistroVacina) {
                        $vacinaEscolhida = Vacina::find($vacina->id);
                        $vacinaAtrasada = false;

                        $idadePeriodoInicial = Carbon::createFromDate($paciente->data_nascimento)->diff($periodoInicialCarbon);
                        $idadePeriodoFinal =  Carbon::createFromDate($paciente->data_nascimento)->diff($periodoFinalCarbon);

                        $periodo = CarbonPeriod::create($periodoInicialCarbon, $periodoFinalCarbon);

                        // Iterando a cada dia no período
                        foreach ($periodo as $data) {
                            $idadeData = Carbon::createFromDate($paciente->data_nascimento)->diff($data);
                            $idadeDataAnos = $idadeData->format('%y');
                            $idadeDataMeses = $idadeData->format('%m');
                            $idadeDataDias = $idadeData->format('%d');

                            if ($idadeDataDias >= $vacinaEscolhida->inicio_minimo_dias && $idadeDataDias <= $vacinaEscolhida->inicio_maximo_dias) {
                                $vacinaAtrasada = true;
                            } else {
                                $vacinaAtrasada = false;
                            }
                            if ($idadeDataMeses > $vacinaEscolhida->inicio_minimo_meses && $idadeDataMeses < $vacinaEscolhida->inicio_maximo_meses) {
                                $vacinaAtrasada = true;
                            } else {
                                $vacinaAtrasada = false;
                            }
                            if ($idadeDataAnos > $vacinaEscolhida->inicio_minimo_anos && $idadeDataAnos < $vacinaEscolhida->inicio_maximo_anos) {
                                $vacinaAtrasada = true;
                            } else {
                                $vacinaAtrasada = false;
                            }
                            if ($vacinaAtrasada) {
                                array_push($array, $paciente->id);
                                array_push($array, $paciente->nome);
                                array_push($array, $paciente->data_nascimento);
                                array_push($array, $vacinaEscolhida->vacina);
                                array_push($array, $vacinaEscolhida->dose);
                                array_push($array, $vacinaEscolhida->inicio_minimo_dias);
                                array_push($array, $vacinaEscolhida->inicio_minimo_meses);
                                array_push($array, $vacinaEscolhida->inicio_minimo_anos);
                                array_push($array, $vacinaEscolhida->inicio_maximo_dias);
                                array_push($array, $vacinaEscolhida->inicio_maximo_meses);
                                array_push($array, $vacinaEscolhida->inicio_maximo_anos);
                                array_push($array, $periodoInicialCarbon);
                                array_push($array, $periodoFinalCarbon);
                                array_push($array, $data);
                                array_push($arrayFinal, $array);
                                break;
                            }
                        }
                    }
                }
            }
        }

        return [
            $arrayFinal
        ];
    }
}
