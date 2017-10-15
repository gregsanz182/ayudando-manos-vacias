<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumo';

    public function nino() {
        return $this->belongsTo('App\Nino');
    }

    public function categoria_insumo() {
        return $this->belongsTo('App\Categoria_Insumo');
    }
}
