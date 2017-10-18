<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'usuario';
    protected $primaryKey = 'usuario';

    public function rol() {
        return $this->morphTo();
    }

    public function getAuthPassword() {
        return $this->contrasena;
    }
}
