<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
{
    protected $table = 'cancer';

    public function ninos () {
        return $this->hasMany('App\Nino_Cancer');
    }

}
