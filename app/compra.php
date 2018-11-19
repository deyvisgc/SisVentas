<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
protected $table='compra';
protected $primaryKey='compra_id';
public $timestamps=false;
protected $fillable=[
    'provedor_idprovedor',
    'producto_idproducto',
    'cantidad',
    'precio_compra',
];
}
