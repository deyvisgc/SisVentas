<?php

namespace SisVideo;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='roles';
    protected $primaryKey='idroles';

    public $timestamps=false;

    protected $fillable=[
        'nombre_rol',
    ];

    public function user()
{
    return $this->belongsTo(User::class,'idRol');
}
}
