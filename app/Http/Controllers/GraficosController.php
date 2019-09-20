<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;
use App\Vacina;
class GraficosController extends Controller
{
    public function index()
    {
        $listaVacinas = Vacina::all();
        $listaUnidades = Unidade::all();

        return view(
            'graficos/graficos',
            [
                'listaVacinas' => $listaVacinas,
                'listaUnidades' => $listaUnidades,

            ]
        );
    }
}
