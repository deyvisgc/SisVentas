<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table='producto';
    protected $primaryKey='idproducto';
    public $timestamps=false;

    protected $fillable=[
        'idcategoria',
        'codigo',
        'nombre_pro',
        'stock',
        'descripcion',
        'imagen',
        'estado',
        'Precio_Pro',
        'Fecha_Registro',


        'nombre_cate',
        'estado',

    ];


}
