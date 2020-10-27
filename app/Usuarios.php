<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    public function publicaciones(){
        return $this->hasMany('App\Publicaciones');
    }
    public function comentarios(){
        return $this->hasMany('App\Comentarios');
    }
    public function personas(){
        return $this->belongsTo('App\Personas');
    }
    public function roles(){
        return $this->belongsTo('App\Usuarios');
    }
}
