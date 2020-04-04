<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rentas;
use App\Articulos;
use App\Detallerentas;

class RentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rentas::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $renta = new Rentas;

        $renta->folio=$request->get('folio');
        $renta->id_empleado=$request->get('id_empleado');
        $renta->fecha_renta=$request->get('fecha_renta');
        $renta->fecha_devolucion=$request->get('fecha_devolucion');
        $renta->total=$request->get('total');

       //

        $detail=[];

        $detalles=$request->get('detalles');

        for ($i=0; $i < count($detalles); $i++) { 
            $detail[]=[
                'folio'=>$request->get('folio'),
                'id_articulo'=>$detalles[$i]['id_articulo'],
                //'cantidad'=>$detalles[$i]['cantidad'],
                'precio'=>$detalles[$i]['precio'],
                'total'=>$detalles[$i]['total'],
            ];
        }

        $renta->save();

        Detallerentas::insert($detail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Rentas::find($id);
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
