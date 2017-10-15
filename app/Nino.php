<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nino extends Model
{
    protected $table = 'nino';

    public function representante() {
        return $this->belongsTo('App\Representante', 'representate_id', 'id');
    }

    public function mensajes() {
        return $this->hasMany('App\Mensaje', 'nino_id', 'id');
    }

    public function canceres () {
        return $this->hasMany('App\Nino_Cancer', 'nino_id', 'id');
    }

    public function insumos () {
        return $this->hasMany('App\Insumo', 'nino_id', 'id');
    }

    public function medicamentos () {
        return $this->hasMany('App\Nino_Medicamento', 'nino_id', 'id');
    }
}
