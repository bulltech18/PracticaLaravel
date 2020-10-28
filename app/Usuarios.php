<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Usuarios as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Usuarios extends Authenticatable
{
    use HasApiTokens, Notifiable;
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
