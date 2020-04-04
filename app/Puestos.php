<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puestos extends Model
{
    protected $table='puestos';
    protected $primaryKey='id_puesto';

    public $Fillable=[
    	'id_puesto',
    	'puesto'
    ];
}
