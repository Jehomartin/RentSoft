<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    public $incrementing = false;
    public $timestamps = false;

    protected $Fillable = [
    	'id_usuario',
    	'nombre',
    	'apellidos',
    	'telefono',
        'contrasenia',
    	'localidad',
    	'direccion'
    ];
}
