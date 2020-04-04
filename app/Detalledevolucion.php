<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalledevolucion extends Model
{
    protected $table='detalle_devoluciones';
    protected $primaryKey='id_detalle';
    protected $with=['articulo'];

    public $incrementing=true;

    protected $Fillable=[
    	'id_detalle',
        'id_articulo',
    	'folio_dev'
    ];

    public function articulo(){
        return $this->belongTo(Articulos::class,'id_articulo','id_articulo');
    }
}
