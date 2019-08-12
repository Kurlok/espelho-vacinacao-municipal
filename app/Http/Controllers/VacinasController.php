<?php

namespace App\Http\Controllers;

use App\Vacina;
use Illuminate\Http\Request;

class VacinasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cadastrarVacina()
    {

        return view('vacinas/cadastro');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaVacinas = Vacina::paginate(15);
        //  $listaPacientes = DB::table('pacientes')->paginate(15);

        return view(
            'vacinas/vacinas',
            [
                'listaVacinas' => $listaVacinas,
            ],
            
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function show(Vacina $vacina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacina $vacina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacina $vacina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacina  $vacina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacina $vacina)
    {
        //
    }
}
