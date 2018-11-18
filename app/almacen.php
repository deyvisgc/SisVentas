<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class almacen extends Model
{
    protected $table="almacen";
    protected $primaryKey="idalmacen";
    public $timestamps=false;
    protected $fillable=[

        'idproducto',
        'compra_compra_id',
    ];
}
