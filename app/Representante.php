<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class representante extends Model
{
    protected $table = 'representante';

    public function localidad() {
        return $this->belongsTo('App\Localidad', 'localidad_id', 'id');
    }

    public function ninos() {
        return $this->hasMany('App\Nino', 'representante_id', 'id');
    }
}
