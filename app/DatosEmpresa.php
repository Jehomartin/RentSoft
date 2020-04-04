<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosEmpresa extends Model
{
    protected $table='datos_empresa';
    protected $primaryKey='rfc';

    /*public $incrememting=false;
    public $timestamps=false;*/

    protected $Fillable=[
    	'rfc',
    	'nombre',
    	'encargado',
    	'correo',
    	'telefono',
    	'direccion',
    	'localidad'
    ];
}
