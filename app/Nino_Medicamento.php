<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nino_Medicamento extends Model
{
    protected $table = 'nino_medicamento';

    public function nino() {
        return $this->belongsTo('App\Nino');
    }

    public function medicamento() {
        return $this->belongsTo('App\Medicamento');
    }

    public static function getNextId() {
        return DB::table('nino_medicamento')->max('id')+1;
    }
}
