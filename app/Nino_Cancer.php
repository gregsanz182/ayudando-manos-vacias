<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nino_Cancer extends Model
{
    protected $table = 'nino_cancer';

    public function nino() {
        return $this->belongsTo('App\Nino');
    }

    public function cancer() {
        return $this->belongsTo('App\Cancer');
    }

    public static function getNextId() {
        return DB::table('nino_cancer')->max('id')+1;
    }
}
