<?php

namespace App\Exports;

use App\Vacina;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TodasVacinasExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vacina::all();
    }

    public function headings(): array
    {

        return [
            'Código',
            'Vacina',
            'Dose',
            'Situação'
        ];
    }

}
