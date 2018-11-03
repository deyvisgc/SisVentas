<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table ="categoria";
    protected $primaryKey ="idcategoria";

    protected $fillable=[

        'nombre_cate',
        'estado',
    ];
}
