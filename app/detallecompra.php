<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class detallecompra extends Model
{
    protected $table='detallecompra';
    protected $primaryKey='iddetallecompra';
    public $timestamps=false;

    protected $fillable=[
        'idcompra',
        'cantidad',
        'id_producto',
        'precio_venta',

    ];
}
