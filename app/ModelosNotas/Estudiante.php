<?php

namespace App\ModelosNotas;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Estudiante extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='estudiantes';
    

    protected $fillable = [
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'email',
        'password',
        'codigo',
        'estado'
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeCodigo($query,$codigo){

        $query->where('codigo','like',$codigo.'%');
    }

     public function matriculas(){

        return $this->hasMany('App\ModelosNotas\Matricula');
    }
}
