<?php

namespace App\Exports;

use App\Paciente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataNascimentoPacientesExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    protected $nascimentoInicial;
    protected $nascimentoFinal;

    public function __construct($dataInicial, $dataFinal)
    {
        $this->nascimentoInicial = $dataInicial;
        $this->nascimentoFinal = $dataFinal; 
    }

    public function collection()
    {
        return Paciente::whereDate('data_nascimento', '>=', $this->nascimentoInicial)
        ->whereDate('data_nascimento', '<=', $this->nascimentoFinal) 
        ->get();
    }

    public function headings(): array
    {
        return [
            'Código',
            'Paciente',
            'Nome da mãe',
            'Nº SUS',
            'Data de Nascimento',
            'Sexo',
            'Gestante',
            'Óbito',
            'Localidade',
            'Telefone',
            'Telefone Alternativo',
            'Observações',
            'Cód. do Usuário que Cadastrou',
            'Criado em',
            'Modificado em',
        ];
    }
}
