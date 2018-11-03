<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    protected $table='provedor';
    protected $primaryKey='idprovedor';
    public $timestamps=false;

    protected $fillable=[
        'estado',
        'tipoPersona_idtipoPersona',


    ];
}
