<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;

class UnidadesController extends Controller
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
        $listaUnidades = Unidade::paginate(15);
        //  $listaUnidades = DB::table('unidades')->paginate(15);

        return view(
            'unidades/unidades',
            [
                'listaUnidades' => $listaUnidades,
            ],
            
        );

    }

    public function getUnidade(int $id)
    {
        $unidade = Unidade::find($id);
        return view(
            'unidades/cadastro',
            ['unidade' => $unidade]
        );
    }

    public function buscaUnidade(Request $request)
    {
        $q = $request->input('q');

        //Conversão da data
        //$dataBr = $q;
       // $date = str_replace('/', '-', $dataBr);
       // $dataSql = date("Y-m-d", strtotime($date));

        //Busca
        if ($q != "") {
            $listaUnidades = Unidade::where('unidade', 'LIKE', '%' . $q . '%')
                ->orWhere('endereco', 'LIKE', '%' . $q . '%')
                ->orWhere('cnes', 'LIKE', '%' . $q . '%')

                ->paginate(15)->setPath('/unidades/busca');
            $pagination = $listaUnidades->appends(array(
                'q' => $q
            ));
            if (count($listaUnidades) > 0)
                return view(
                    'unidades/unidades',
                    [
                        'listaUnidades' => $listaUnidades
                    ]
                );
        } else {
            return redirect()->route('unidades');
        }

        return view('unidades/unidades')->withMessage('No Details found. Try to search again !');
    }


    public function telaCadastroUnidade()
    {
        
        return view('unidades/cadastro');
    }

    public function cadastrarUnidade(Request $request)
    {
        $validatedData = $request->validate([
            'unidade' => 'required|string|max:255',
            'dose' => 'required|string|max:255',
        ]);
        $unidade = new Unidade();
        $unidade->unidade = $request->unidade;
        $unidade->dose = $request->dose;


        $unidade->save();
        $paciente = new Paciente;
        $paciente = Paciente::all();

        $listaUnidadesTamanho = Unidade::count();
        foreach($paciente as $pac){
            $pac->unidades()->attach($unidade->id, ['data_aplicacao' => null]);
        }
    

        return redirect()->route('telaCadastroUnidade');
        //->with('mensagemAlteracaoDados', 'Dados alterados com sucesso!');

        // return view(
        //     'unidades/cadastro',
        //     ['unidade' => $unidade]
        // );
    }

    public function alterarUnidade(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'unidade' => 'required|string|max:255',
            'dose' => 'required|string|max:255',
        ]);
        $unidade = Unidade::find($id);
        $unidade->unidade = $request->unidade;
        $unidade->dose = $request->dose;

        $unidade->save();

        return redirect()->route('unidades');
    }

    public function deletarUnidade(int $id)
    {
        $unidade = Unidade::find($id);
        $unidade->delete();

        return redirect()->route('unidades');
    }
}
