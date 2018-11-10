<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table='cliente';
    protected $primaryKey='idcliente';
    public $timestamps=false;
    protected $fillable=[

        'tipoPersona_idtipoPersona',
        'clien_estado',
    ];
}
