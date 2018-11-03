<?php

namespace SisVentas;

use Illuminate\Database\Eloquent\Model;

class TipoPer extends Model
{
    protected $table='tipopersona';
    protected $primaryKey='idtipoPersona';
    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'Apellido_paterno',
        'Apellido_Materno',
        'Direccion',
        'dni',
        'telefono',
        'sexo',
        'gmail',
        'Fecha_Ingreso',
        'Fecha_nacimiento',

    ];
}
