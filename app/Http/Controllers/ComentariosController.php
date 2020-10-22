<?php

namespace App\Http\Controllers;

use App\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
    public function consultaPersona(int $persona_id, int $id ){
        return response()->json([
            'Persona'=>( $id==null)? 
            Comentarios::where('persona_id', $persona_id)->get():
            Comentarios::where('persona_id', $persona_id)->where('id',$id)->get()
        ],200);
    }
    
    public function comentarioPubli(int $publicacion_id, int $id){
        return response()->json([
         'Respuesta'=>($id==null)?
         Comentarios::where('publicacion_id', $publicacion_id)->get():
         Comentarios::where('publicacion_id', $publicacion_id)->where('id', $id)->get()   
        ], 200);

    }
    public function personaPublicacionComent(int $persona_id, int $publicacion_id, int $id = NULL){
        return response()->json([
         'Respuesta'=>($id==null)?
         Comentarios::where('persona_id', $persona_id)->where('publicacion_id', $publicacion_id)->get():
         Comentarios::where('persona_id', $persona_id)->where('publicacion_id', $publicacion_id)->where('id', $id)->get()
        ], 200);

    }
    public function mostrarTodo(){
       return response()->json([
           'Respuesta' => DB::table('Comentarios')->join('publicaciones', 'publicaciones.id','=','comentarios.publicacion_id')->join('personas', 'personas.id', '=' , 'comentarios.persona_id')->select('comentarios.*', 'publicaciones.*', 'personas.*')->get()

       ], 200); 
    }
}
