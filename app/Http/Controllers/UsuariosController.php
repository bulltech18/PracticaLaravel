<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UsuariosController extends Controller
{
  

    public function registro(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $usuario = new Usuarios();
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->password =Hash::make($request->password);
        $usuario->persona_id = $request->persona_id;
        $usuario->rol_id = $request->rol_id;
 
        if($usuario->save()){
            return response()->json($usuario,201);
            return abort(400,"No es posible registrarse");
        }
    }
    public function logIn(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $usuario = Usuarios::where('email', $request->email)->first();
        
        if(! $usuario || ! Hash::check($request->password, $usuario->password)){
            throw ValidateException::withMessages([
                'email' => ['Credenciales incorrectas...'],
            ]);
        }

        if($usuario->rol_id == 2){
            $token = $usuario->createToken($request->email,['Admin'])->plainTextToken;
        }
        else if($usuario->rol_id == 1){
            $token = $usuario->createToken($request->email,['Usuario'])->plainTextToken;
        }
        
        return response()->json(["token"=>$token],201);
    }
    public function logOut(Request $request){
        return response()->json(['usuarios'=>$request->user()->tokens()->delete()],200);
    }
    public function index(Request $request){
        
     if($request->user()->tokenCan('Usuario')){
         return response()->json(["Eres un usuario. Scope Invalido"],401);
         
     }
     elseif($request->user()->tokenCan('Admin')){
        return response()->json(["Administrador"=>$request->user()],200);
        
    }

     
    }
}
