<?php

namespace SisVideo;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','imagen','Persona_idPersona','username','remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
// esta funccion sirve para relacionar la users con la tabla rol
    public function rol(){
        return $this->hasMany('SisVideo\Rol',' idRol','id');
        
    }
}
