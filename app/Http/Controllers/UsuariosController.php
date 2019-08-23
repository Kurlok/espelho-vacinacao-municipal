<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    public function index()
    {
        $listaUsuarios = User::paginate(15);
        //  $listaVacinas = DB::table('vacinas')->paginate(15);

        return view(
            'usuarios/usuarios',
            [
                'listaUsuarios' => $listaUsuarios,
            ],

        );
    }

    public function getUsuario(int $id)
    {
        $usuario = User::find($id);
        return view(
            'usuarios/cadastro',
            ['usuario' => $usuario]
        );
    }

    public function telaCadastroUsuario()
    {
        
        return view('usuarios/cadastro');
    }

    public function cadastrarUsuario(Request $request)
    {

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->password = Hash::make($request->password);
        $usuario->email = $request->email;
        $usuario->cpf = $request->cpf;
        $usuario->unidade = $request->unidade;
        $usuario->permissao = $request->permissao;
        $usuario->funcao = $request->funcao;


        $usuario->save();

        return redirect()->route('usuarios');

    }

    public function alterarUsuario(Request $request, int $id)
    {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->password = Hash::make($request->password);
        $usuario->email = $request->email;
        $usuario->cpf = $request->cpf;
        $usuario->unidade = $request->unidade;
        $usuario->permissao = $request->permissao;
        $usuario->funcao = $request->funcao;

        $usuario->save();

        return redirect()->route('usuarios');
    }

    public function deletarUsuario(int $id)
    {
        $vacina = User::find($id);
        $vacina->delete();

        return redirect()->route('usuarios');
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
            $listaUsuarios = User::where('name', 'LIKE', '%' . $q . '%')
                ->orWhere('unidade', 'LIKE', '%' . $q . '%')
                ->orWhere('funcao', 'LIKE', '%' . $q . '%')
                ->paginate(15)->setPath('/vacinas/busca');
            $pagination = $listaUsuarios->appends(array(
                'q' => Input::get('q')
            ));
            if (count($listaUsuarios) > 0)
                return view(
                    'usuarios/usuarios',
                    [
                        'listaUsuarios' => $listaUsuarios
                    ]
                );
        } else {
            return redirect()->route('usuarios');
        }

        return view('usuarios/usuarios')->withMessage('No Details found. Try to search again !');
    }
}
