<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $table = 'vacinas';
    public function pacientes()
    {
        return $this->belongsToMany('App\Vacinas', 'pacientes_vacinas', 'fk_vacinas_id','fk_pacientes_id');
    }
}
