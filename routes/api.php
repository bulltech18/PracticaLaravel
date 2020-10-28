<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//personas
Route::get('personas/{id?}','PersonasController@show')->where( 'id','[0-9]+')->middleware('verificar.rol');

Route::delete('eliminar/{id?}','PersonasController@eliminar')->where( 'id','[0-9]+');

Route::get('personas/registro','PersonasController@create')->middleware('verificar.edad');

Route::put('personas/update/{id?}/{nombre?}/{apellido?}/{edad?}/{sexo?}','PersonasController@update')->where(['id'=>'[0-9]+','nombre'=>'[A-Z,a-z]+',
'apellido'=>'[A-Z,a-z]+','edad'=>'[0-9]+','sexo'=>'[A-Z,a-z]+']);

Route::get('publicaciones/{id?}','PublicacionesController@show')->where( 'id','[0-9]+');


//publicaciones
Route::get('publicaciones/{id?}','PublicacionesController@show')->where( 'id','[0-9]+');
Route::get('publicaciones/NuevaPubli/{titulo?}/{cuerpo?}/{persona_id?}','PublicacionesController@create')->where(['titulo'=>'[A-Z,a-z]+',
'cuerpo'=>'[A-Z,a-z]+','persona_id'=>'[0-9]+']);
Route::put('publicaciones/update/{id}/{titulo?}/{cuerpo?}/{persona_id?}','PublicacionesController@update')->where(['id'=>'[0-9]+','titulo'=>'[A-Z,a-z]+',
'cuerpo'=>'[A-Z,a-z]+','persona_id'=>'[0-9]+']);
Route::delete('publicaciones/eliminar/{id?}','PublicacionesController@destroy')->where( 'id','[0-9]+');
Route::get('/buscar/persona/{persona}/publicacion/{publicacion?}','PublicacionesController@publicacionPersona')->where(
    [
        'persona' => '[0-9]+',
        'publicacion' =>'[0-9]+'
    ]
);



//comentarios
Route::get('comentarios/nuevoComent/{cuerpo?}/{publicacion_id?}/{persona_id?}','ComentariosController@create')->where(['cuerpo'=>'[A-Z,a-z]+','publicacion_id'=>'[0-9]+', 'persona_id'=>'[0-9]+']);
Route::get('comentarios/{id?}','ComentariosController@show')->where( 'id','[0-9]+');
Route::put('comentarios/actualizar/{id?}')->where( 'id','[0-9]+');
Route::delete('comentarios/eliminar/{id}','ComentariosController@destroy')->where('id','[0-9]+');
Route::get('persona/{persona_id}/comentario/{id?}','ComentariosController@consultaPersona')
->where( ['id','[0-9]+','persona_id','[0-9]+']);
Route::get('personas/{persona_id}/publicaciones/{publicacion_id}/comentarios/{id?}', 'ComentariosController@personaPublicacionComent')->where( ['publicacion_id','[0-9]+','id','[0-9]+','persona_id','[0-9]+']);
Route::get('comentarios/publicaciones/personas', 'ComentariosController@mostrarTodo');
Route::get('publicacion/{publicacion_id}/comentario/{id?}', 'ComentariosController@comentarioPubli')->where( ['publicacion_id','[0-9]+','id','[0-9]+']);


