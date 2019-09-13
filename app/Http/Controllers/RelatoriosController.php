<?php

namespace App\Http\Controllers;

use App\Vacina;
use Illuminate\Http\Request;

class RelatoriosController extends Controller
{
    public function index()
    {
        $listaVacina = Vacina::all();
        return view(
            'relatorios/relatorios',
            [
                'listaVacina' => $listaVacina,
            ]
        );
    }}
