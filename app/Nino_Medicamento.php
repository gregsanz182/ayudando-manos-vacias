<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nino_Medicamento extends Model
{
    protected $table = 'nino_medicamento';

    public function nino() {
        return $this->belongsTo('App\Nino');
    }

    public function medicamento() {
        return $this->belongsTo('App\Medicamento');
    }
}
