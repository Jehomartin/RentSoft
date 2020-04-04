<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rentas extends Model
{
    protected $table = 'rentas';
    protected $primaryKey = 'folio';
    protected $with=['empleado'];

    public $incrementing = false;
    public $timestamps = false;

    protected $Fillable = [
    	'folio',
    	'id_empleado',
    	'fecha_renta',
    	'fecha_devolucion',
        'total'
    ];

    public function empleado(){
        return $this->belongsTo(Empleados::class,'id_empleado','id_empleado');
    }

}
