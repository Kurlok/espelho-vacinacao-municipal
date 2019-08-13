<?php

namespace App\Http\Controllers;

use App\Vacina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class VacinasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaVacinas = Vacina::paginate(15);
        //  $listaVacinas = DB::table('vacinas')->paginate(15);

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

    public function getVacina(int $id)
    {
        $vacina = Vacina::find($id);
        return view(
            'vacinas/cadastro',
            ['vacina' => $vacina]
        );
    }

    public function buscaVacina()
    {
        $q = Input::get('q');

        //Conversão da data
        //$dataBr = $q;
       // $date = str_replace('/', '-', $dataBr);
       // $dataSql = date("Y-m-d", strtotime($date));

        //Busca
        if ($q != "") {
            $listaVacinas = Vacina::where('vacina', 'LIKE', '%' . $q . '%')
                ->orWhere('dose', 'LIKE', '%' . $q . '%')
                ->paginate(15)->setPath('/vacinas/busca');
            $pagination = $listaVacinas->appends(array(
                'q' => Input::get('q')
            ));
            if (count($listaVacinas) > 0)
                return view(
                    'vacinas/vacinas',
                    [
                        'listaVacinas' => $listaVacinas
                    ]
                );
        } else {
            return redirect()->route('vacinas');
        }

        return view('vacinas/vacinas')->withMessage('No Details found. Try to search again !');
    }

    public function visualizaVacina()
    {
        return view('vacinas/cadastro');
    }

    public function telaCadastroVacina()
    {
        
        return view('vacinas/cadastro');
    }

    public function cadastrarVacina(Request $request)
    {

        $vacina = new Vacina();
        $vacina->vacina = $request->vacina;
        $vacina->dose = $request->dose;


        $vacina->save();

        return redirect()->route('telaCadastroVacina');
        //->with('mensagemAlteracaoDados', 'Dados alterados com sucesso!');

        // return view(
        //     'vacinas/cadastro',
        //     ['vacina' => $vacina]
        // );
    }

    public function alterarVacina(Request $request, int $id)
    {
        $vacina = Vacina::find($id);
        $vacina->vacina = $request->vacina;
        $vacina->dose = $request->dose;

        $vacina->save();

        return redirect()->route('vacinas');
    }

    public function deletarVacina(int $id)
    {
        $vacina = Vacina::find($id);
        $vacina->delete();

        return redirect()->route('vacinas');
    }
}

