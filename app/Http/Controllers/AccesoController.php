<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleados;
use App\Usuarios;

use Session;
use Redirect;
use Cookie;
use Cache;

class AccesoController extends Controller
{
    public function validar (Request $request)
    {
    	$usuario=$request->usuario;
    	$password=$request->pass;

    	$user=$request->usuario;
    	$contra=$request->pass;

    	$var = Usuarios::where('id_usuario','=',$user)
    	->where('contrasenia','=',$contra)->get();

    	$res = Empleados::where('id_empleado','=',$usuario)
    	->where('contrasenia','=',$password)->get();

    	if (count($res)>0) {
    		$usuario = $res[0]->nombre.' '.$res[0]->apellidos;
    		Session::put('usuario',$usuario);
    		Session::put('puesto',$res[0]->puesto->puesto);
            Session::put('foto',$res[0]->foto);

    		if ($res[0]->puesto->puesto=="Administrador") {
    			return Redirect::to('bienvenida');
    		}elseif ($res[0]->puesto->puesto=="Vendedor") {
    			return Redirect::to('inicio');
    		}

    	}elseif (count($var)>0) {
    		$user = $var[0]->nombre.' '.$var[0]->apellidos;
    		Session::put('usuario',$user);

    		return Redirect::to('index');

    	}else{
    		return Redirect::to('mensaje');
    	}
    }

    public function salir ()
    {
    	Session::flush();
    	Session::reflash();
    	Cache::flush();
    	Cookie::forget('laravel_session');
    	unset($_COOKIE);
    	unset($_SESSION);
    	return Redirect::to('login');
    }
}
