<?php

namespace App\Exports;

use App\Unidade;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TodasUnidadesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Unidade::all();
    }

    public function headings(): array
    {
        return [
            'Código',
            'Unidade',
            'Endereço',
            'CNES'
        ];
    }
}
