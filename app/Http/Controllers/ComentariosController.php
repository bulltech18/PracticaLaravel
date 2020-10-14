<?php

namespace App\Http\Controllers;

use App\Comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
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
    public function create(string $cuerpo, int $publicacion_id, int $persona_id)
    {
        $nuevoRegistro = new Comentarios;
        $nuevoRegistro->cuerpo = $cuerpo;
        $nuevoRegistro->publicacion_id = $publicacion_id;
        $nuevoRegistro->persona_id = $persona_id;

        $nuevoRegistro->save();
        return response()->json('Agregado Correctamente',200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(Comentarios $comentarios,int $id=0)
    {
        $comentarios = ($id==0)? Comentarios::all():Comentarios::find($id);
        return response()->json($comentarios,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, text $cuerpo)
    {
        $actualizado = Comentarios::find($id);
        $actualizado->cuerpo = $cuerpo;
        $actualizado->save();

        return response()->json('Actualizado',202);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Comentarios::destroy($id);
        return response()->json('Eliminado',200);
    }
}
