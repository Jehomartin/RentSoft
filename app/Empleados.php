<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    //se llama a la tabla con la que se trabajara
    protected $table = 'empleados';

    //se llama la llave primaria
    protected $primaryKey = 'id_empleado';

    protected $with=['puesto'];

    public $incrementing = false;
    public $timestamps = false;

    //se llama los datos con los que se trabajará

    protected $Fillable=[
    	'id_empleado',
    	'nombre',
    	'apellidos',
    	'telefono',
        'contrasenia',
    	'edad',
    	'sexo',
    	'id_puesto'
    ]; 

    public function puesto(){
        return $this->belongsTo(Puestos::class,'id_puesto','id_puesto');
    }
}
