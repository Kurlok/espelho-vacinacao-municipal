<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    public function vacinas()
    {
        return $this->belongsToMany('App\Paciente', 'pacientes_vacinas', 'fk_pacientes_id', 'fk_vacinas_id');
    }
}
