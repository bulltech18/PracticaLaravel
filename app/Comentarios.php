<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    public function persona(){
        return $this->belongsto('App\Personas');
    }
    public function publicaciones(){
        return $this->belongsto('App\Publicaciones');
    }
}
