<?php

namespace App\Http\Controllers;

use App\Publicaciones;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(string $titulo, text $cuerpo, int $persona_id)
    {
        $registroNuevo = new Publicaciones;
        $registroNuevo->titulo = $titulo;
        $registroNuevo->cuerpo = $cuerpo;
        $registroNuevo->persona_id = $persona_id;

        $registroNuevo->save();
        return response()->json('Complete',200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Publicaciones $publicaciones,int $id=0)
    {
        $publicaciones = ($id==0)? Publicaciones::all():Publicaciones::find($id);
        return response()->json($publicaciones,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, text $titulo, text $cuerpo)
    {
        $actualizar = Publicaciones::find($id);
        $actualizar->titulo = $titulo;
        $actualizar->cuerpo= $cuerpo;
        $actualizar->save();
        return response()->json('Modificada correctamente', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Publicaciones::destroy($id);
        return response()->json('Eliminado',202);
    }

    public function publicacionPersona(int $persona, int $publicacion = null){

        return response()->json([
                                "publicacion"=>($publicacion == null)?\App\Publicaciones::where('persona_id', $persona)->get():\App\Publicaciones::where('persona_id', $persona)->where('id',$publicacion)->get()
                                ],200);
    }
}
