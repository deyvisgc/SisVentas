<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class vendedor extends Model
{
    protected $table='vendedor';
    protected $primaryKey='idVendedor';

    public $timestamps=false;

    protected $fillable=[
        'estado',
        'persona_idpersona',
    ];

}
