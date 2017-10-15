<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamento';

    public function ninos() {
        return $this->hasMany('App\Nino_Medicamento');
    }
}
