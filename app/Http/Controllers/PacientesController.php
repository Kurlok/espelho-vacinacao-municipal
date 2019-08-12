<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listaPacientes = Paciente::paginate(15);
        //  $listaPacientes = DB::table('pacientes')->paginate(15);

        return view(
            'pacientes/pacientes',
            [
                'listaPacientes' => $listaPacientes,
            ],
        );
    }

    public function getPaciente(int $id)
    { 
        $paciente = Paciente::find($id);
        return view(
            'pacientes/cadastro',
            ['paciente' => $paciente]
        );
    }

    public function buscaPaciente()
    {
        $q = Input::get('q');

        //Conversão da data
        $dataBr = $q;
        $date = str_replace('/', '-', $dataBr);
        $dataSql = date("Y-m-d", strtotime($date));

        //Busca
        if ($q != "") {
            $listaPacientes = Paciente::where('nome', 'LIKE', '%' . $q . '%')
                ->orWhere('localidade', 'LIKE', '%' . $q . '%')
                ->orWhere('data_nascimento', 'LIKE', '%' . $dataSql . '%')
                ->orWhere('sus', 'LIKE', '%' . $q . '%')
                ->paginate(15)->setPath('/pacientes/busca');
            $pagination = $listaPacientes->appends(array(
                'q' => Input::get('q')
            ));
            if (count($listaPacientes) > 0)
                return view('pacientes/pacientes', ['listaPacientes' => $listaPacientes]);
        } else {
            return redirect()->route('pacientes');
        }

        return view('pacientes/pacientes')->withMessage('No Details found. Try to search again !');
    }

    public function visualizaPaciente()
    {
        return view('pacientes/cadastro');
    }

    public function cadastrarPaciente()
    {

        return view('pacientes/cadastro');
    }

    public function editarPaciente(Request $request, int $id)
    {
        $paciente = Paciente::find($id);
        $paciente->nome = $request->nome;
        $paciente->nome_mae = $request->nome;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->localidade = $request->localidade;
        $paciente->sus = $request->sus;
        $paciente->sexo = $request->sexo;
        $paciente->gestante = $request->gestante;
        $paciente->obito = $request->obito;
        $paciente->telefone = $request->telefone;
        $paciente->telefone_alternativo = $request->telefone_alternativo;

        //$paciente->save();

        //return redirect()->route('conta')->with('mensagemAlteracaoDados', 'Dados alterados com sucesso!');

        return view(
            'pacientes/cadastro',
            ['paciente' => $paciente]
        );
    }
}
