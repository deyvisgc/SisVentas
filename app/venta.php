<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $table='venta';
    protected $primaryKey='idventa';
    public $timestamps=false;

    protected $fillable=[
        'total_venta',
        'cliente_idcliente'
    ];

}
