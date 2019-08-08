<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pacientes/pacientes');
    }   
    
    public function visualizaPaciente()
    {
        return view('pacientes/cadastro');
    } 

    public function editaPaciente()
    {
        return view('pacientes/pacientes');
    } 

}
