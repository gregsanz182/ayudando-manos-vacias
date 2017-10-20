<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacora';
    
        public function usuario() {
            return $this->belongsTo('App\Usuario');
        }
}
