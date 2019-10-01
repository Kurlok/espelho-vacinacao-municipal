<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Vacina;
use Illuminate\Http\Request;

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

    public function buscaVacina(Request $request)
    {
       // $q = Input::get('q');
       //$q = $request->input('q');
        $q = $request->input('q');

        //Conversão da data
        //$dataBr = $q;
       // $date = str_replace('/', '-', $dataBr);
       // $dataSql = date("Y-m-d", strtotime($date));

        //Busca
        if ($q != "") {
            $listaVacinas = Vacina::where('vacina', 'LIKE', '%' . $q . '%')
                ->orWhere('dose', 'LIKE', '%' . $q . '%')
                ->orWhere('status', 'LIKE', '%' . $q . '%')
                ->paginate(15)->setPath('/vacinas/busca');
            $pagination = $listaVacinas->appends(array(
                'q' => $q
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


    public function telaCadastroVacina()
    {
        
        return view('vacinas/cadastro');
    }

    public function cadastrarVacina(Request $request)
    {
        $validatedData = $request->validate([
            'vacina' => 'required|string|max:255',
            'dose' => 'required|string|max:255',
        ]);
        
        $vacina = new Vacina();
        $vacina->vacina = $request->vacina;
        $vacina->dose = $request->dose;
        $vacina->status = 'Ativo';  

        $vacina->save();
        $paciente = new Paciente;
        $paciente = Paciente::all();

        $listaVacinasTamanho = Vacina::count();
        foreach($paciente as $pac){
            $pac->vacinas()->attach($vacina->id, ['data_aplicacao' => null]);
        }
    

        return redirect()->route('telaCadastroVacina');
        //->with('mensagemAlteracaoDados', 'Dados alterados com sucesso!');

        // return view(
        //     'vacinas/cadastro',
        //     ['vacina' => $vacina]
        // );
    }

    public function alterarVacina(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'vacina' => 'required|string|max:255',
            'dose' => 'required|string|max:255',
        ]);
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

    public function desativarVacina(int $id)
    {
        $vacina = Vacina::find($id);
        if ($vacina->status = 'Ativo')
        $vacina->status = 'Inativo';
        $vacina->save();

        return redirect()->route('vacinas');
    }

    public function ativarVacina(int $id)
    {
        $vacina = Vacina::find($id);
        if ($vacina->status = 'Inativo')
        $vacina->status = 'Ativo';
        $vacina->save();

        return redirect()->route('vacinas');
    }
}

