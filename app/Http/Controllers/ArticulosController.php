<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Articulos::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = new Articulos;

        $articulo->id_articulo = $request->get('id_articulo');
        $articulo->nombre = $request->get('nombre');
        $articulo->tipo = $request->get('tipo');
        $articulo->disponible = $request->get('disponible');
        $articulo->precio = $request->get('precio');

        $articulo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Articulos::find($id);
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
        $articulo = Articulos::find($id);

        $articulo->id_articulo = $request->get('id_articulo');
        $articulo->nombre = $request->get('nombre');
        $articulo->tipo = $request->get('tipo');
        $articulo->disponible = $request->get('disponible');
        $articulo->precio = $request->get('precio');

        $articulo->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Articulos::destroy($id);
    }
}
