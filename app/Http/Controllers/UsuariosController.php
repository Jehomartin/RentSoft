<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

use Redirect;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuarios::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Usuarios;

        $user->id_usuario=$request->get('id_usuario');
        $user->nombre=$request->get('nombre');
        $user->apellidos=$request->get('apellidos');
        $user->telefono=$request->get('telefono');
        $user->contrasenia=$request->get('contrasenia');
        $user->localidad=$request->get('localidad');
        $user->direccion=$request->get('direccion');
        
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Usuarios::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Usuarios::find($id);

        $user->id_usuario=$request->get('id_usuario');
        $user->nombre=$request->get('nombre');
        $user->apellidos=$request->get('apellidos');
        $user->telefono=$request->get('telefono');
        $user->contrasenia=$request->get('contrasenia');
        $user->localidad=$request->get('localidad');
        $user->direccion=$request->get('direccion');
        
        $user->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Usuarios::destroy($id);
    }
}
