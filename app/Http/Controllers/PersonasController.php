<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
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
    public function create(request $request)
    {
        $registroNuevo = new Personas;
        $registroNuevo->nombre = $request -> nombre;
        $registroNuevo->apellido = $request -> apellido;
        $registroNuevo->edad = $request-> edad;
        $registroNuevo->sexo = $request -> sexo;

        $registroNuevo->Save();
        return response()->json('Complete',202);
        
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
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas, int $id=0)
    {
        $personas= ($id==0)? Personas::all():Personas::find($id);
        return response()->json($personas,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, string $nombre, string $apellido, int $edad, string $sexo)
    {
        $actualizar = Personas::find($id);

        $actualizar->nombre = $nombre;
        $actualizar->apellido = $apellido;
        $actualizar->edad = $edad;
        $actualizar->sexo = $sexo;

        $actualizar->Save();
        return response()->json('Complete',202);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    
     /*public function destroy(int $id)
    {
        Personas::delete($id);
        return response()->json('Se Elimino Correctamente',202);
    }*/
    public function eliminar(int $id){
        $eliminarPersona = \App\Personas::find($id);
        $eliminarPersona->delete();
        return response()->json([
                                "mensaje" => "persona eliminada",
                                "persona" => \App\Personas::all()
                                ],200);
    }
}
