<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nino extends Model
{
    protected $table = 'nino';

    static $relacionesRepr = [
        0 => "Padre/Madre",
        1 => "Tío(a)",
        2 => "Primo(a)",
        3 => "Hermano(a)",
        4 => "Amigo(a)",
        5 => "Abuelo(a)",
        6 => "Padrino(a)", 
        7 => "Padrastro/Madrastra"
    ];

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
        return $this->hasMany('App\Nino_Insumo');
    }

    public function medicamentos () {
        return $this->hasMany('App\Nino_Medicamento');
    }
}
