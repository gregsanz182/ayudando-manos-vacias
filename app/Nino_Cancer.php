<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nino_Cancer extends Model
{
    protected $table = 'nino_cancer';

    public function nino() {
        return $this->belongsTo('App\Nino');
    }

    public function cancer() {
        return $this->belongsTo('App\Cancer');
    }
}
