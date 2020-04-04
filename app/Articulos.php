<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'id_articulo';

    public $incrementing = false;
    public $timestamps = false;

    public $Fillable=[
    	'id_articulo',
    	'nombre',
    	'tipo',
    	'disponible',
    	'precio'
    ];
}
