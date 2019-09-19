<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacina;
class GraficosController extends Controller
{
    public function index()
    {
        $listaVacina = Vacina::all();
        return view(
            'graficos/graficos',
            [
                'listaVacina' => $listaVacina,
            ]
        );
    }
}
