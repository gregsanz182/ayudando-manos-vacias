<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensaje';

    public function nino() {
        return $this->belongsTo('App\Nino', 'nino_id', 'id');
    }
}
