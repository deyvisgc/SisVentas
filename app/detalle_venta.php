<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{
    protected $table='detalle_venta';
    protected $primaryKey='iddetalle_Venta';
    public $timestamps=false;

    protected $fillable=[
        'idventa',
        'cantidad',
        'id_producto',
        'precio_venta',
    ];
}
