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
            'Data quando a vacina estará pendente',
        ];
    }

    public function array(): array
    {
        $arrayFinal = array();

        $listaPacientes = Paciente::all();
        $listaVacinas = Vacina::all();
        $periodoInicialCarbon = new Carbon($this->periodoInicial);
        $periodoFinalCarbon = new Carbon($this->periodoFinal);

        if ($this->idVacina != 'todas') {
            foreach ($listaPacientes as $paciente) {
                $array = array();
                $naoExisteRegistroVacina = DB::table('pacientes_vacinas')
                    ->where([
                        ['fk_vacinas_id', '=', $this->idVacina],
                        ['fk_pacientes_id', '=', $paciente->id]
                    ])
                    ->doesntExist();

                if ($naoExisteRegistroVacina) {
                    $dataNascimentoPacienteCarbon = new Carbon($paciente->data_nascimento);

                    $vacinaEscolhida = Vacina::find($this->idVacina);
                    $vacinaAtrasada = false;

                    $periodo = CarbonPeriod::create($periodoInicialCarbon, $periodoFinalCarbon);

                    // Iterando a cada dia no período
                    foreach ($periodo as $data) {
                       // $idadeData = Carbon::createFromDate($paciente->data_nascimento)->diffInDays($data, false);
                       // $data = new Carbon($dt);

                      //  $dataSubtraidoMinimo = new Carbon();
                      //  $dataSubtraidoMaximo = new Carbon();

                        $dataSubtraidoMinimo = new Carbon($data);
                        $dataSubtraidoMaximo = new Carbon($data);

                        if ($vacinaEscolhida->inicio_minimo_anos != 0) {
                            $dataSubtraidoMinimo->subYears($vacinaEscolhida->inicio_minimo_anos);
                        }
                        if ($vacinaEscolhida->inicio_minimo_meses != 0) {
                            $dataSubtraidoMinimo->subMonths($vacinaEscolhida->inicio_minimo_meses);
                        }
                        if ($vacinaEscolhida->inicio_minimo_dias != 0) {
                            $dataSubtraidoMinimo->subDays($vacinaEscolhida->inicio_minimo_dias);
                        }
                        if ($vacinaEscolhida->inicio_maximo_anos != 0) {
                            $dataSubtraidoMaximo->subYears($vacinaEscolhida->inicio_maximo_anos);
                        }
                        if ($vacinaEscolhida->inicio_maximo_meses != 0) {
                            $dataSubtraidoMaximo->subMonths($vacinaEscolhida->inicio_maximo_meses);
                        }
                        if ($vacinaEscolhida->inicio_maximo_dias != 0) {
                            $dataSubtraidoMaximo->subDays($vacinaEscolhida->inicio_maximo_dias);
                        }

                        if (($dataNascimentoPacienteCarbon->lessThanOrEqualTo($dataSubtraidoMinimo)) && ($dataNascimentoPacienteCarbon->greaterThanOrEqualTo($dataSubtraidoMaximo))) {
                            $vacinaAtrasada = true;
                        } else {
                            $vacinaAtrasada = false;
                        }

                        if ($vacinaAtrasada) {
                            array_push($array, $paciente->id);
                            array_push($array, $paciente->nome);
                            // $dataNascimentoFormatada =  Carbon::parse($paciente->data_nascimento);
                            // $dataNascimentoFormatada = $dataNascimentoFormatada->format('d/m/Y');
                            // $dataPendenciaFormatada =  Carbon::parse($data);
                            // $dataPendenciaFormatada = $dataPendenciaFormatada->format('d/m/Y');
                            array_push($array, $paciente->data_nascimento);
                            array_push($array, $data->toDateString());


                            array_push($arrayFinal, $array);
                            break;
                        }
                    }
                }
            }
        } else {
            foreach ($listaPacientes as $paciente) {
                $array = array();
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
                        $periodo = CarbonPeriod::create($periodoInicialCarbon, $periodoFinalCarbon);

                        // Iterando a cada dia no período
                        foreach ($periodo as $data) {
                            $idadeData = Carbon::createFromDate($paciente->data_nascimento)->diffInDays($data, false);

                            if ($idadeData >= 0 && $idadeData > $vacinaEscolhida->inicio_minimo_dias && $idadeData < $vacinaEscolhida->inicio_maximo_dias) {
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
                                array_push($array, $vacinaEscolhida->inicio_maximo_dias);
                                array_push($array, $data->toDateString());
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
