<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = 'unidades';
    public function vacinas()
    {
        return $this->belongsToMany('App\Unidade', 'pacientes_vacinas', 'fk_unidades_id', 'fk_vacinas_id')->withPivot('data_aplicacao');
    }
}
