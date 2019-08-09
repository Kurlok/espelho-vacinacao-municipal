<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function visualizaPaciente()
    {
        return view('pacientes/cadastro');
    } 

    public function editaPaciente()
    {
        return view('pacientes/cadastro');
    } 

}
