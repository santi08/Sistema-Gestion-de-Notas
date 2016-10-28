<?php

namespace App;

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
        'firstname','secondname','lastname','secondlastname', 'email', 'password','codigo','idrol','estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
