<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Empleados::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleados;
        $empleado->id_empleado = $request->get('id_empleado');
        $empleado->nombre = $request->get('nombre');
        $empleado->apellidos = $request->get('apellidos');
        $empleado->telefono = $request->get('telefono');
        $empleado->contrasenia = $request->get('contrasenia');
        $empleado->edad = $request->get('edad');
        $empleado->sexo = $request->get('sexo');
        $empleado->id_puesto = $request->get('id_puesto');

        $empleado->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Empleados::find($id);
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
        $empleado = Empleados::find($id);
        $empleado->id_empleado = $request->get('id_empleado');
        $empleado->nombre = $request->get('nombre');
        $empleado->apellidos = $request->get('apellidos');
        $empleado->telefono = $request->get('telefono');
        $empleado->contrasenia = $request->get('contrasenia');
        $empleado->edad = $request->get('edad');
        $empleado->sexo = $request->get('sexo');
        $empleado->id_puesto = $request->get('id_puesto');

        $empleado->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Empleados::destroy($id);
    }

}
