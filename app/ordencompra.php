<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class ordencompra extends Model
{
    protected  $table="orden_conpra";
    protected $primaryKey="idorden_conpra";
    public $timestamps=false;

    protected $fillable=[
        'fecha_Regis_orde',
        'producto_idproducto',
    ];
}
