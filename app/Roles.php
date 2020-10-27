<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function usuarios(){
        return $this->hasOne('App\Usuarios');
    }
}
