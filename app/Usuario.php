<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 */
class Usuario extends Model
{
    protected $table = 'usuario';

    protected $primaryKey = 'Id';

	public $timestamps = false;

    protected $fillable = [
        'Identificacion',
        'Nombre',
        'Apellidos',
        'Correo',
        'Contacto'
    ];

    protected $guarded = [];

        
}