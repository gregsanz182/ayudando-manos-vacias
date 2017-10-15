<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nino extends Model
{
    protected $table = 'nino';

    public function representante() {
        return $this->belongsTo('App\Representante');
    }

    public function mensajes() {
        return $this->hasMany('App\Mensaje');
    }

    public function canceres () {
        return $this->hasMany('App\Nino_Cancer');
    }

    public function insumos () {
        return $this->hasMany('App\Insumo');
    }

    public function medicamentos () {
        return $this->hasMany('App\Nino_Medicamento');
    }
}
