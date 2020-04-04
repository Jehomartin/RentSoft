<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detallerentas extends Model
{
    protected $table='detalle_rentas';
    protected $primaryKey='id';
    protected $with=['articulo','renta'];

    public $timestamps=false;
    public $incrementing=false;

    protected $Fillable=[
    	'id',
        'id_articulo',
        //'cantidad',
        'precio',
        'total',
        'folio'
    ];

    public function articulo(){
        return $this->belongTo(Articulos::class,'id_articulo','id_articulo');
    }

    public function renta(){
        return $this->belongTo(Rentas::class,'folio','folio');
    }
}
