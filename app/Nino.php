<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Nino extends Model
{
    protected $table = 'nino';

    static $relacionesRepr = [
        1 => "Padre/Madre",
        2 => "Tío(a)",
        3 => "Primo(a)",
        4 => "Hermano(a)",
        5 => "Amigo(a)",
        6 => "Abuelo(a)",
        7 => "Padrino(a)", 
        8 => "Padrastro/Madrastra"
    ];

    public function representante() {
        return $this->belongsTo('App\Representante');
    }

    public function mensajes() {
        return $this->hasMany('App\Mensaje');
    }

    public function canceres () {
        return $this->hasMany('App\Nino_Cancer')->orderBy('fecha_desde', 'DESC');
    }

    public function insumos () {
        return $this->hasMany('App\Nino_Insumo');
    }

    public function insumosRequeridos() {
        return $this->hasMany('App\Nino_Insumo')->where('estado_requerimiento', 'Requerido')->where('cantidad', '>', 0)->where('fecha', '>=', Carbon::now('America/Caracas'));
    }

    public function medicamentos () {
        return $this->hasMany('App\Nino_Medicamento');
    }
    
    public function medicamentosRequeridos () {
        return $this->hasMany('App\Nino_Medicamento')->where('estado_requerimiento', 'Requerido')->where('cantidad', '>', 0)->where('fecha', '>=', Carbon::now('America/Caracas'));
    }
}
