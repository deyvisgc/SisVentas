<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='roles';
    protected $primaryKey='rol_idrol';

    public $timestamps=false;

    protected $fillable=[
        'nombre_rol',
    ];

    public function user()
{
    return $this->belongsTo(User::class,'idRol');
}
}
