<?php

namespace App\Exports;

use App\Paciente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class DataNascimentoPacientesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection($dataInicial, $dataFinal)
    {
        return Paciente::whereDate('data_nascimento', '>=', $dataInicial)
        ->whereDate('data_nascimento', '<=', $dataFinal) 
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
