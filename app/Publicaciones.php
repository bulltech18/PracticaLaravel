<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    public function persona(){
        return $this->belongsTo('App\Personas');
    }
    public function comentarios(){
        return $this->hasMany('App\Comentarios');
    }
}
