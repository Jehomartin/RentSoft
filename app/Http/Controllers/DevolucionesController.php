<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devoluciones;
use App\Articulos;
use App\Detalledevolucion;

class DevolucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Devoluciones::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $devolucion = new Devoluciones;
        $devolucion->folio_dev = $request->get('folio_dev');
        $devolucion->fecha_devolucion = $request->get('fecha_devolucion');
        $devolucion->id_empleado = $request->get('id_empleado');

        $devo=[];

        $detalles=$request->get('detalles');

        for ($i=0; $i < count($detalles); $i++) { 
            $devo[]=[
                'folio_dev'=>$request->get('folio_dev'),
                'id_articulo'=>$detalles[$i]['id_articulo']
            ];
        }

        $devolucion->save();

        Detalledevolucion::insert($devo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Devoluciones::find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
