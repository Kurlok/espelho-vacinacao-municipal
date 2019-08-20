<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        $usuario->password = $request->password;
        $usuario->cpf = $request->cpf;
        $usuario->unidade = $request->unidade;
        $usuario->permissao = $request->permissao;
        $usuario->funcao = $request->funcao;


        $usuario->save();
    }
}
