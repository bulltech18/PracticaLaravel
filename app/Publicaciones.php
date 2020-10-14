<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    public function persona(){
        return $this->belongsto('App\Personas');
    }
    public function comentarios(){
        return $this->hasmany('App\Comentarios');
    }
}
