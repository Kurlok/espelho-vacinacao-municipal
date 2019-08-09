<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listaPacientes = Paciente::paginate(20);
      //  $listaPacientes = DB::table('pacientes')->paginate(15);

        return view('pacientes/pacientes',
        [
            'listaPacientes' => $listaPacientes,
        ],
    );
    }   
    
    public function getPacientes()
    {
    } 

    public function buscaPaciente()
    {
        $q = Input::get('q');
        if ($q != "") {
            $listaPacientes = Paciente::where('nome', 'LIKE', '%' . $q . '%')->paginate(20)->setPath('pacientes');
            $pagination = $listaPacientes->appends(array(
                'q' => Input::get('q')
            ));
            if (count($listaPacientes) > 0)
            return view('pacientes/pacientes', ['listaPacientes' => $listaPacientes])->withDetails($listaPacientes)->withQuery($q);
               // return view('pacientes/pacientes')->withDetails($paciente)->withQuery($q);
        }
        return view('pacientes/pacientes')->withMessage('No Details found. Try to search again !');
    }

    public function visualizaPaciente()
    {
        return view('pacientes/cadastro');
    } 

    public function editaPaciente()
    {
        return view('pacientes/cadastro');
    } 

}
