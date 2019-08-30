<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $table = 'vacinas';
    public function pacientes()
    {
        return $this->belongsToMany('App\Vacina', 'pacientes_vacinas', 'fk_vacinas_id','fk_pacientes_id')->withPivot('data_aplicacao');
    }
}
