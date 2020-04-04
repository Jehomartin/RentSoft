<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devoluciones extends Model
{
    protected $table='devoluciones';
    protected $primaryKey='folio_dev';
    protected $with=['empleado'];

    public $timestamps=false;
    public $incrementing=false;

    protected $Fillable=[
    	'folio_dev',
    	'fecha_devolucion',
    	'id_empleado'
    ];

     public function empleado(){
        return $this->belongsTo(Empleados::class,'id_empleado','id_empleado');
    }

}
