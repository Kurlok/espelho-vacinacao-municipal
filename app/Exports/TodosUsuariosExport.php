<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TodosUsuariosExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'Código',
            'Usuário',
            'E-mail',
            'Criado em',
            'Modificado em',
            'CPF',
            'Unidade',
            'Permissão',
            'Função',
            'Senha Redefinida em',
        ];
    }

}
