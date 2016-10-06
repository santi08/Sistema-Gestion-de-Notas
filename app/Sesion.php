<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sesion
 */
class Sesion extends Model
{
    protected $table = 'sesion';

    protected $primaryKey = 'Id';

	public $timestamps = true;

    protected $fillable = [
        'UsuarioIdentificacion',
        'Contrasena',
        'Estado',
        'remember_token'
    ];

    protected $guarded = [];

        
}