<?php

namespace SisVideo;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    protected $primaryKey='idPersona';
    public $timestamps=false;

    protected $fillable=[
        'Apellido_Pater',
        'Apellido_Mater',
        'dni',
        'Fecha_nacimiento',
        'Direccion',
        'Estado',
        'roles_idroles',
        'telefono',

    ];
}
