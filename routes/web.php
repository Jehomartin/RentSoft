<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//enrutamiento de los controladores
Route::apiResource('apiArticulo','ArticulosController');
Route::apiResource('apiEmpleado','EmpleadosController');
Route::apiResource('apiUsuario','UsuariosController');
Route::apiResource('apiRenta','RentasController');
Route::apiResource('apiDevolucion','DevolucionesController');
Route::apiResource('apiDetallerenta','DetalleRentasController');
Route::apiResource('apiDetalledevolu','DetalleDevolucionesController');
Route::apiResource('apiContacto','DatosEmpresaController');
Route::apiResource('apiPuesto','PuestosController');


//enrutamiento de las vistas
Route::view('login','login');
Route::view('index','index');
Route::view('registro','nuevouser');
Route::view('prendas','articulos.prendas');
Route::view('muebles','articulos.muebles');
Route::view('ayuda','contactanos');
Route::view('mensaje','mensaje');


//rutas de validación
Route::post('entrar','AccesoController@validar');
Route::get('sale','AccesoController@salir');

//rutas para administrativos
Route::view('bienvenida','administracion.bienvenida');
Route::view('empleados','administracion.empleados');
Route::view('articulos','administracion.articulos');
Route::view('clientes','administracion.clientes');
Route::view('rentas','administracion.rentas');
Route::view('devolucion','administracion.devoluciones');

//ruta para el vendedor
Route::view('rentar','admin.rentas2');
Route::view('inicio','admin.inicio');
Route::view('devolver','admin.devoluciones2');
