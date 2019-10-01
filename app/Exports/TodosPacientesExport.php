<?php

namespace App\Exports;

use App\Paciente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TodosPacientesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Paciente::all();
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
