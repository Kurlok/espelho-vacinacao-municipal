<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Unidade;
use App\Vacina;
use App\Rules\PalavrasMinimas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $listaVacinas = Vacina::where('status', 'Ativo')
            ->get()
            ->sortBy(function ($item) {
                return $item->vacina . '#' . $item->dose;
            });
        $listaUnidades = Unidade::all();

        return view(
            'pacientes/cadastro',
            [
                'paciente' => $paciente,
                'listaVacinas' => $listaVacinas,
                'listaUnidades' => $listaUnidades,
            ]
        );
    }

    public function buscaPaciente(Request $request)
    {
        //$q = Input::get('q');
        $q = $request->input('q');

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
                'q' => $q
            ));
            if (count($listaPacientes) > 0)
                return view(
                    'pacientes/pacientes',
                    [
                        'listaPacientes' => $listaPacientes
                    ]
                );
        } else {
            return redirect()->route('pacientes');
        }

        return view('pacientes/pacientes')->withMessage('No Details found. Try to search again !');
    }

    public function visualizaPaciente()
    {
        return view('pacientes/cadastro');
    }

    public function telaCadastroPaciente()
    {
        $listaVacinas = Vacina::all()
            ->sortBy(function ($item) {
                return $item->vacina . '#' . $item->dose;
            });
        $listaUnidades = Unidade::all();

        return view(
            'pacientes/cadastro',
            [
                'listaVacinas' => $listaVacinas,
                'listaUnidades' => $listaUnidades,
            ]
        );
    }

    public function cadastrarPaciente(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255', new PalavrasMinimas],
            'sexo' => 'required',
        ]);

        //Trabalhando com os checkboxes
        if ($request->obito == 'on') $obito = 'Verdadeiro';
        else  $obito = 'Falso';
        if ($request->gestante == 'on') $gestante = 'Verdadeiro';
        else  $gestante = 'Falso';

        $paciente = new Paciente();
        $paciente->nome = $request->nome;
        $paciente->nome_mae = $request->nome_mae;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->localidade = $request->localidade;
        $paciente->sus = $request->sus;
        $paciente->sexo = $request->sexo;
        $paciente->gestante = $gestante;
        $paciente->obito = $obito;
        $paciente->telefone = $request->telefone;
        $paciente->telefone_alternativo = $request->telefone_alternativo;
        $paciente->observacoes = $request->observacoes;
        $paciente->fk_users_id = Auth::id();

        $paciente->save();

        $listaVacinasTamanho = Vacina::count();
        $vacina = new Vacina();
        for ($i = 0; $i < $listaVacinasTamanho; $i++) {
            $vacina->id = $request->input("idVacina.$i");
            $data_aplicacao = $request->input("dataVacina.$i");
            $descricao_outras = $request->input("descricaoOutras.$i");
            $idUnidade = $request->input("unidadeVacina.$i");
            if ($data_aplicacao != null) {
                Paciente::find($paciente->id)->vacinas()->attach($vacina->id, [
                    'data_aplicacao' => $vacina->data_aplicacao,
                    'descricao_outras' => $descricao_outras,
                    'fk_unidades_id' => $idUnidade,
                    'fk_users_id' => Auth::id()

                ]);
            }
        }
        //echo $paciente->id;
        return redirect()->route('pacientes');
        //->with('mensagemAlteracaoDados', 'Dados alterados com sucesso!');

        // return view(
        //     'pacientes/cadastro',
        //     ['paciente' => $paciente]
        // );
    }

    public function alterarPaciente(Request $request, int $id)
    {

        //Trabalhando com os checkboxes
        if ($request->obito == 'on') $obito = 'Verdadeiro';
        else  $obito = 'Falso';
        if ($request->gestante == 'on') $gestante = 'Verdadeiro';
        else  $gestante = 'Falso';

        $paciente = Paciente::find($id);
        $paciente->nome = $request->nome;
        $paciente->nome_mae = $request->nome_mae;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->localidade = $request->localidade;
        $paciente->sus = $request->sus;
        $paciente->sexo = $request->sexo;
        $paciente->gestante = $gestante;
        $paciente->obito = $obito;
        $paciente->telefone = $request->telefone;
        $paciente->telefone_alternativo = $request->telefone_alternativo;
        $paciente->observacoes = $request->observacoes;
        $paciente->fk_users_id = Auth::id();

        $paciente->save();

        $listaVacinasTamanho = Vacina::count();

        $vacina = new Vacina();
        for ($i = 0; $i < $listaVacinasTamanho; $i++) {
            $vacina->id = $request->input("idVacina.$i");
            $vacina->data_aplicacao = $request->input("dataVacina.$i");
            $descricao_outras = $request->input("descricaoOutras.$i");
            $idUnidade = $request->input("unidadeVacina.$i");
            Paciente::find($paciente->id)->vacinas()->updateExistingPivot($vacina->id, [
                'data_aplicacao' => $vacina->data_aplicacao,
                'descricao_outras' => $descricao_outras,
                'fk_unidades_id' => $idUnidade,
                'fk_users_id' => Auth::id()
            ]);
        }
        return redirect()->route('pacientes');
    }

    public function deletarPaciente(int $id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();

        return redirect()->route('pacientes');
    }
}
