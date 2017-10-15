<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'localidad';

    public function ciudades() {
        return $this->hasMany('Localidad', 'localidad_id', 'id');
    }

    public function estado() {
        return $this->belongsTo('Localidad', 'localidad_id', 'id');
    }

    public function representantes() {
        return $this->hasMany('App\Representante');
    }
}
