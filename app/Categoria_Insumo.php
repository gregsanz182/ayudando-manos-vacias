<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_Insumo extends Model
{
    protected $table = 'categoria_insumo';

    public function insumos() {
        return $this->hasMany('App\Nino_Insumo');
    }
}
